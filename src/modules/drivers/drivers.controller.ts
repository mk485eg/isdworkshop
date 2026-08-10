import { Request, Response } from "express";
import * as driversService from "./drivers.service";

export async function listDrivers(req: Request, res: Response) {
  const drivers = await driversService.listDrivers(req.user!.companyId);
  res.status(200).json(drivers);
}

export async function getDriver(req: Request, res: Response) {
  const driver = await driversService.getDriver(req.user!.companyId, req.params.id);
  res.status(200).json(driver);
}

export async function createDriver(req: Request, res: Response) {
  const driver = await driversService.createDriver(req.user!.companyId, req.body);
  res.status(201).json(driver);
}

export async function updateDriver(req: Request, res: Response) {
  const driver = await driversService.updateDriver(req.user!.companyId, req.params.id, req.body);
  res.status(200).json(driver);
}

export async function activateDriver(req: Request, res: Response) {
  const driver = await driversService.setDriverStatus(req.user!.companyId, req.params.id, "ACTIVE");
  res.status(200).json(driver);
}

export async function deactivateDriver(req: Request, res: Response) {
  const driver = await driversService.setDriverStatus(req.user!.companyId, req.params.id, "INACTIVE");
  res.status(200).json(driver);
}
