import { JobStatus } from "@prisma/client";
import { prisma } from "../../lib/prisma";
import { AppError } from "../../utils/AppError";
import { createNotification } from "../notifications/notifications.service";
import { AssignJobInput, CreateJobInput, ListJobsQuery, UpdateJobInput } from "./jobs.schema";

const EDITABLE_STATUSES: JobStatus[] = ["PENDING", "ASSIGNED"];
const DELETABLE_STATUSES: JobStatus[] = ["PENDING", "CANCELLED"];
const ASSIGNABLE_STATUSES: JobStatus[] = ["PENDING", "ASSIGNED"];
const TERMINAL_STATUSES: JobStatus[] = ["COMPLETED", "FAILED", "CANCELLED"];

export async function listJobs(companyId: string, query: ListJobsQuery) {
  return prisma.job.findMany({
    where: { companyId, ...(query.status ? { status: query.status } : {}) },
    orderBy: { createdAt: "desc" },
    include: { driver: true, vehicle: true },
  });
}

export async function getJob(companyId: string, jobId: string) {
  const job = await prisma.job.findFirst({
    where: { id: jobId, companyId },
    include: { driver: true, vehicle: true },
  });
  if (!job) {
    throw AppError.notFound("Job not found");
  }
  return job;
}

export async function createJob(companyId: string, input: CreateJobInput) {
  return prisma.job.create({ data: { ...input, companyId } });
}

export async function updateJob(companyId: string, jobId: string, input: UpdateJobInput) {
  const job = await getJob(companyId, jobId);
  if (!EDITABLE_STATUSES.includes(job.status)) {
    throw AppError.conflict(`Cannot update a job with status ${job.status}`);
  }
  return prisma.job.update({ where: { id: jobId }, data: input });
}

export async function deleteJob(companyId: string, jobId: string) {
  const job = await getJob(companyId, jobId);
  if (!DELETABLE_STATUSES.includes(job.status)) {
    throw AppError.conflict(`Cannot delete a job with status ${job.status}`);
  }
  await prisma.job.delete({ where: { id: jobId } });
}

export async function assignJob(companyId: string, jobId: string, input: AssignJobInput) {
  const job = await getJob(companyId, jobId);
  if (!ASSIGNABLE_STATUSES.includes(job.status)) {
    throw AppError.conflict(`Cannot assign a job with status ${job.status}`);
  }

  const driver = await prisma.driver.findFirst({ where: { id: input.driverId, companyId } });
  if (!driver) {
    throw AppError.badRequest("Driver not found");
  }
  if (driver.status !== "ACTIVE") {
    throw AppError.badRequest("Driver is not active");
  }

  const vehicle = await prisma.vehicle.findFirst({ where: { id: input.vehicleId, companyId } });
  if (!vehicle) {
    throw AppError.badRequest("Vehicle not found");
  }
  if (vehicle.status !== "ACTIVE") {
    throw AppError.badRequest("Vehicle is not active");
  }

  const updated = await prisma.job.update({
    where: { id: jobId },
    data: { driverId: driver.id, vehicleId: vehicle.id, status: "ASSIGNED" },
  });

  await createNotification(
    companyId,
    "JOB_ASSIGNED",
    `Job ${job.reference} assigned to driver ${driver.name}`,
    job.id
  );

  return updated;
}

function assertTransition(job: { status: JobStatus }, allowedFrom: JobStatus[], action: string) {
  if (!allowedFrom.includes(job.status)) {
    throw AppError.conflict(`Cannot ${action} a job with status ${job.status}`);
  }
}

export async function acceptJob(companyId: string, jobId: string) {
  const job = await getJob(companyId, jobId);
  assertTransition(job, ["ASSIGNED"], "accept");

  const updated = await prisma.job.update({ where: { id: jobId }, data: { status: "ACCEPTED" } });
  await createNotification(companyId, "JOB_ACCEPTED", `Job ${job.reference} was accepted`, job.id);
  return updated;
}

export async function startJob(companyId: string, jobId: string) {
  const job = await getJob(companyId, jobId);
  assertTransition(job, ["ACCEPTED"], "start");

  const updated = await prisma.job.update({
    where: { id: jobId },
    data: { status: "IN_PROGRESS", startedAt: new Date() },
  });
  await createNotification(companyId, "JOB_STARTED", `Job ${job.reference} started`, job.id);
  return updated;
}

export async function completeJob(companyId: string, jobId: string) {
  const job = await getJob(companyId, jobId);
  assertTransition(job, ["IN_PROGRESS"], "complete");

  const updated = await prisma.job.update({
    where: { id: jobId },
    data: { status: "COMPLETED", completedAt: new Date() },
  });
  await createNotification(companyId, "JOB_COMPLETED", `Job ${job.reference} completed`, job.id);
  return updated;
}

export async function failJob(companyId: string, jobId: string, reason?: string) {
  const job = await getJob(companyId, jobId);
  assertTransition(job, ["IN_PROGRESS"], "fail");

  const updated = await prisma.job.update({
    where: { id: jobId },
    data: { status: "FAILED", failureReason: reason },
  });
  await createNotification(companyId, "JOB_FAILED", `Job ${job.reference} failed`, job.id);
  return updated;
}

export async function cancelJob(companyId: string, jobId: string, reason?: string) {
  const job = await getJob(companyId, jobId);
  if (TERMINAL_STATUSES.includes(job.status)) {
    throw AppError.conflict(`Cannot cancel a job with status ${job.status}`);
  }

  const updated = await prisma.job.update({
    where: { id: jobId },
    data: { status: "CANCELLED", cancelledAt: new Date(), failureReason: reason },
  });
  await createNotification(companyId, "JOB_CANCELLED", `Job ${job.reference} was cancelled`, job.id);
  return updated;
}
