import { Router } from "express";
import { asyncHandler } from "../../utils/asyncHandler";
import { requireAuth } from "../../middleware/auth";
import { validateBody, validateQuery } from "../../middleware/validate";
import {
  assignJobSchema,
  createJobSchema,
  jobReasonSchema,
  listJobsQuerySchema,
  updateJobSchema,
} from "./jobs.schema";
import * as jobsController from "./jobs.controller";

const router = Router();

router.use(requireAuth);

// CRUD + assign
router.get("/", validateQuery(listJobsQuerySchema), asyncHandler(jobsController.listJobs));
router.get("/:id", asyncHandler(jobsController.getJob));
router.post("/", validateBody(createJobSchema), asyncHandler(jobsController.createJob));
router.patch("/:id", validateBody(updateJobSchema), asyncHandler(jobsController.updateJob));
router.delete("/:id", asyncHandler(jobsController.deleteJob));
router.post("/:id/assign", validateBody(assignJobSchema), asyncHandler(jobsController.assignJob));

// Workflow
router.post("/:id/accept", asyncHandler(jobsController.acceptJob));
router.post("/:id/start", asyncHandler(jobsController.startJob));
router.post("/:id/complete", asyncHandler(jobsController.completeJob));
router.post("/:id/fail", validateBody(jobReasonSchema), asyncHandler(jobsController.failJob));
router.post("/:id/cancel", validateBody(jobReasonSchema), asyncHandler(jobsController.cancelJob));

export default router;
