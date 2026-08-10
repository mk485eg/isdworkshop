import { Request, Response } from "express";
import * as dashboardService from "./dashboard.service";

export async function getStats(req: Request, res: Response) {
  const stats = await dashboardService.getDashboardStats(req.user!.companyId);
  res.status(200).json(stats);
}
