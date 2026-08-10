import { Request, Response } from "express";
import * as companyService from "./company.service";

export async function getCompany(req: Request, res: Response) {
  const company = await companyService.getCompany(req.user!.companyId);
  res.status(200).json(company);
}

export async function updateCompany(req: Request, res: Response) {
  const company = await companyService.updateCompany(req.user!.companyId, req.body);
  res.status(200).json(company);
}
