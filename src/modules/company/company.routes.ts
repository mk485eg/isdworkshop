import { Router } from "express";
import { asyncHandler } from "../../utils/asyncHandler";
import { requireAuth } from "../../middleware/auth";
import { validateBody } from "../../middleware/validate";
import { updateCompanySchema } from "./company.schema";
import * as companyController from "./company.controller";

const router = Router();

router.use(requireAuth);
router.get("/", asyncHandler(companyController.getCompany));
router.patch("/", validateBody(updateCompanySchema), asyncHandler(companyController.updateCompany));

export default router;
