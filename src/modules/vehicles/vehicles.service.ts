import { VehicleStatus } from "@prisma/client";
import { prisma } from "../../lib/prisma";
import { AppError } from "../../utils/AppError";
import { CreateVehicleInput, UpdateVehicleInput } from "./vehicles.schema";

export async function listVehicles(companyId: string) {
  return prisma.vehicle.findMany({ where: { companyId }, orderBy: { createdAt: "desc" } });
}

export async function getVehicle(companyId: string, vehicleId: string) {
  const vehicle = await prisma.vehicle.findFirst({ where: { id: vehicleId, companyId } });
  if (!vehicle) {
    throw AppError.notFound("Vehicle not found");
  }
  return vehicle;
}

export async function createVehicle(companyId: string, input: CreateVehicleInput) {
  return prisma.vehicle.create({ data: { ...input, companyId } });
}

export async function updateVehicle(companyId: string, vehicleId: string, input: UpdateVehicleInput) {
  await getVehicle(companyId, vehicleId);
  return prisma.vehicle.update({ where: { id: vehicleId }, data: input });
}

export async function setVehicleStatus(companyId: string, vehicleId: string, status: VehicleStatus) {
  await getVehicle(companyId, vehicleId);
  return prisma.vehicle.update({ where: { id: vehicleId }, data: { status } });
}
