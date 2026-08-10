import { Router } from "express";
import authRoutes from "../modules/auth/auth.routes";
import companyRoutes from "../modules/company/company.routes";
import driversRoutes from "../modules/drivers/drivers.routes";
import vehiclesRoutes from "../modules/vehicles/vehicles.routes";
import jobsRoutes from "../modules/jobs/jobs.routes";
import dashboardRoutes from "../modules/dashboard/dashboard.routes";
import reportsRoutes from "../modules/reports/reports.routes";
import notificationsRoutes from "../modules/notifications/notifications.routes";

const router = Router();

router.use("/auth", authRoutes);
router.use("/company", companyRoutes);
router.use("/drivers", driversRoutes);
router.use("/vehicles", vehiclesRoutes);
router.use("/jobs", jobsRoutes);
router.use("/dashboard", dashboardRoutes);
router.use("/reports", reportsRoutes);
router.use("/notifications", notificationsRoutes);

export default router;
