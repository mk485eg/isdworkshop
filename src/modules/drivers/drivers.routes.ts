import { Router } from "express";
import { asyncHandler } from "../../utils/asyncHandler";
import { requireAuth } from "../../middleware/auth";
import { validateBody } from "../../middleware/validate";
import { createDriverSchema, updateDriverSchema } from "./drivers.schema";
import * as driversController from "./drivers.controller";

const router = Router();

router.use(requireAuth);
router.get("/", asyncHandler(driversController.listDrivers));
router.get("/:id", asyncHandler(driversController.getDriver));
router.post("/", validateBody(createDriverSchema), asyncHandler(driversController.createDriver));
router.patch("/:id", validateBody(updateDriverSchema), asyncHandler(driversController.updateDriver));
router.post("/:id/activate", asyncHandler(driversController.activateDriver));
router.post("/:id/deactivate", asyncHandler(driversController.deactivateDriver));

export default router;
