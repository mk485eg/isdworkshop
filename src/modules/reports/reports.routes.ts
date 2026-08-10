import { Router } from "express";
import { asyncHandler } from "../../utils/asyncHandler";
import { requireAuth } from "../../middleware/auth";
import { validateQuery } from "../../middleware/validate";
import { dailyReportQuerySchema } from "./reports.schema";
import * as reportsController from "./reports.controller";

const router = Router();

router.use(requireAuth);
router.get("/daily", validateQuery(dailyReportQuerySchema), asyncHandler(reportsController.getDailyReport));

export default router;
