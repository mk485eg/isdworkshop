import { Request, Response } from "express";
import * as jobsService from "./jobs.service";
import { ListJobsQuery } from "./jobs.schema";

export async function listJobs(req: Request, res: Response) {
  const jobs = await jobsService.listJobs(req.user!.companyId, req.query as ListJobsQuery);
  res.status(200).json(jobs);
}

export async function getJob(req: Request, res: Response) {
  const job = await jobsService.getJob(req.user!.companyId, req.params.id);
  res.status(200).json(job);
}

export async function createJob(req: Request, res: Response) {
  const job = await jobsService.createJob(req.user!.companyId, req.body);
  res.status(201).json(job);
}

export async function updateJob(req: Request, res: Response) {
  const job = await jobsService.updateJob(req.user!.companyId, req.params.id, req.body);
  res.status(200).json(job);
}

export async function deleteJob(req: Request, res: Response) {
  await jobsService.deleteJob(req.user!.companyId, req.params.id);
  res.status(204).send();
}

export async function assignJob(req: Request, res: Response) {
  const job = await jobsService.assignJob(req.user!.companyId, req.params.id, req.body);
  res.status(200).json(job);
}

export async function acceptJob(req: Request, res: Response) {
  const job = await jobsService.acceptJob(req.user!.companyId, req.params.id);
  res.status(200).json(job);
}

export async function startJob(req: Request, res: Response) {
  const job = await jobsService.startJob(req.user!.companyId, req.params.id);
  res.status(200).json(job);
}

export async function completeJob(req: Request, res: Response) {
  const job = await jobsService.completeJob(req.user!.companyId, req.params.id);
  res.status(200).json(job);
}

export async function failJob(req: Request, res: Response) {
  const job = await jobsService.failJob(req.user!.companyId, req.params.id, req.body.reason);
  res.status(200).json(job);
}

export async function cancelJob(req: Request, res: Response) {
  const job = await jobsService.cancelJob(req.user!.companyId, req.params.id, req.body.reason);
  res.status(200).json(job);
}
