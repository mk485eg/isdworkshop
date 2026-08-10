import { Router } from "express";
import { asyncHandler } from "../../utils/asyncHandler";
import { requireAuth } from "../../middleware/auth";
import * as dashboardController from "./dashboard.controller";

const router = Router();

router.use(requireAuth);
router.get("/stats", asyncHandler(dashboardController.getStats));

export default router;
