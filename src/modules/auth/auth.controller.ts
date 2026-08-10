import { Request, Response } from "express";
import { AppError } from "../../utils/AppError";
import * as authService from "./auth.service";

export async function register(req: Request, res: Response) {
  const result = await authService.registerCompanyAndAdmin(req.body);
  res.status(201).json(result);
}

export async function login(req: Request, res: Response) {
  const result = await authService.login(req.body);
  res.status(200).json(result);
}

export async function me(req: Request, res: Response) {
  if (!req.user) {
    throw AppError.unauthorized();
  }
  const result = await authService.getCurrentUser(req.user.id);
  res.status(200).json(result);
}
