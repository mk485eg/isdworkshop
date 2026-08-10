import { DriverStatus } from "@prisma/client";
import { prisma } from "../../lib/prisma";
import { AppError } from "../../utils/AppError";
import { CreateDriverInput, UpdateDriverInput } from "./drivers.schema";

export async function listDrivers(companyId: string) {
  return prisma.driver.findMany({ where: { companyId }, orderBy: { createdAt: "desc" } });
}

export async function getDriver(companyId: string, driverId: string) {
  const driver = await prisma.driver.findFirst({ where: { id: driverId, companyId } });
  if (!driver) {
    throw AppError.notFound("Driver not found");
  }
  return driver;
}

export async function createDriver(companyId: string, input: CreateDriverInput) {
  return prisma.driver.create({ data: { ...input, companyId } });
}

export async function updateDriver(companyId: string, driverId: string, input: UpdateDriverInput) {
  await getDriver(companyId, driverId);
  return prisma.driver.update({ where: { id: driverId }, data: input });
}

export async function setDriverStatus(companyId: string, driverId: string, status: DriverStatus) {
  await getDriver(companyId, driverId);
  return prisma.driver.update({ where: { id: driverId }, data: { status } });
}
