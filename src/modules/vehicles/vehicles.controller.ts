import { Request, Response } from "express";
import * as vehiclesService from "./vehicles.service";

export async function listVehicles(req: Request, res: Response) {
  const vehicles = await vehiclesService.listVehicles(req.user!.companyId);
  res.status(200).json(vehicles);
}

export async function getVehicle(req: Request, res: Response) {
  const vehicle = await vehiclesService.getVehicle(req.user!.companyId, req.params.id);
  res.status(200).json(vehicle);
}

export async function createVehicle(req: Request, res: Response) {
  const vehicle = await vehiclesService.createVehicle(req.user!.companyId, req.body);
  res.status(201).json(vehicle);
}

export async function updateVehicle(req: Request, res: Response) {
  const vehicle = await vehiclesService.updateVehicle(req.user!.companyId, req.params.id, req.body);
  res.status(200).json(vehicle);
}

export async function activateVehicle(req: Request, res: Response) {
  const vehicle = await vehiclesService.setVehicleStatus(req.user!.companyId, req.params.id, "ACTIVE");
  res.status(200).json(vehicle);
}

export async function deactivateVehicle(req: Request, res: Response) {
  const vehicle = await vehiclesService.setVehicleStatus(req.user!.companyId, req.params.id, "INACTIVE");
  res.status(200).json(vehicle);
}
