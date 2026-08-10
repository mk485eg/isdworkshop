import { Router } from "express";
import { asyncHandler } from "../../utils/asyncHandler";
import { requireAuth } from "../../middleware/auth";
import * as notificationsController from "./notifications.controller";

const router = Router();

router.use(requireAuth);
router.get("/", asyncHandler(notificationsController.listNotifications));
router.patch("/read-all", asyncHandler(notificationsController.markAllAsRead));
router.patch("/:id/read", asyncHandler(notificationsController.markAsRead));

export default router;
