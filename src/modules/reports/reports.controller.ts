import { Request, Response } from "express";
import * as reportsService from "./reports.service";
import { DailyReportQuery } from "./reports.schema";

export async function getDailyReport(req: Request, res: Response) {
  const { date } = req.query as DailyReportQuery;
  const report = await reportsService.getDailyReport(req.user!.companyId, date);
  res.status(200).json(report);
}
