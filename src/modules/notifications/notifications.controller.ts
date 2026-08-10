import { Request, Response } from "express";
import * as notificationsService from "./notifications.service";

export async function listNotifications(req: Request, res: Response) {
  const unreadOnly = req.query.unread === "true";
  const notifications = await notificationsService.listNotifications(req.user!.companyId, unreadOnly);
  res.status(200).json(notifications);
}

export async function markAsRead(req: Request, res: Response) {
  const notification = await notificationsService.markAsRead(req.user!.companyId, req.params.id);
  res.status(200).json(notification);
}

export async function markAllAsRead(req: Request, res: Response) {
  const result = await notificationsService.markAllAsRead(req.user!.companyId);
  res.status(200).json(result);
}
