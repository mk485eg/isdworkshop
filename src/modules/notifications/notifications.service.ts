import { NotificationType } from "@prisma/client";
import { prisma } from "../../lib/prisma";
import { AppError } from "../../utils/AppError";

export async function createNotification(
  companyId: string,
  type: NotificationType,
  message: string,
  jobId?: string
) {
  return prisma.notification.create({ data: { companyId, type, message, jobId } });
}

export async function listNotifications(companyId: string, unreadOnly: boolean) {
  return prisma.notification.findMany({
    where: { companyId, ...(unreadOnly ? { isRead: false } : {}) },
    orderBy: { createdAt: "desc" },
  });
}

export async function markAsRead(companyId: string, notificationId: string) {
  const notification = await prisma.notification.findFirst({
    where: { id: notificationId, companyId },
  });
  if (!notification) {
    throw AppError.notFound("Notification not found");
  }
  return prisma.notification.update({ where: { id: notificationId }, data: { isRead: true } });
}

export async function markAllAsRead(companyId: string) {
  await prisma.notification.updateMany({
    where: { companyId, isRead: false },
    data: { isRead: true },
  });
  return { updated: true };
}
