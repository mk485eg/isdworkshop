import { Router } from "express";
import { asyncHandler } from "../../utils/asyncHandler";
import { requireAuth } from "../../middleware/auth";
import { validateBody } from "../../middleware/validate";
import { createVehicleSchema, updateVehicleSchema } from "./vehicles.schema";
import * as vehiclesController from "./vehicles.controller";

const router = Router();

router.use(requireAuth);
router.get("/", asyncHandler(vehiclesController.listVehicles));
router.get("/:id", asyncHandler(vehiclesController.getVehicle));
router.post("/", validateBody(createVehicleSchema), asyncHandler(vehiclesController.createVehicle));
router.patch("/:id", validateBody(updateVehicleSchema), asyncHandler(vehiclesController.updateVehicle));
router.post("/:id/activate", asyncHandler(vehiclesController.activateVehicle));
router.post("/:id/deactivate", asyncHandler(vehiclesController.deactivateVehicle));

export default router;
