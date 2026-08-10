import { prisma } from "../../lib/prisma";

export async function getDashboardStats(companyId: string) {
  const startOfToday = new Date();
  startOfToday.setHours(0, 0, 0, 0);
  const startOfTomorrow = new Date(startOfToday);
  startOfTomorrow.setDate(startOfTomorrow.getDate() + 1);

  const [
    totalDrivers,
    activeDrivers,
    totalVehicles,
    activeVehicles,
    totalJobs,
    jobsByStatus,
    jobsToday,
    unreadNotifications,
  ] = await Promise.all([
    prisma.driver.count({ where: { companyId } }),
    prisma.driver.count({ where: { companyId, status: "ACTIVE" } }),
    prisma.vehicle.count({ where: { companyId } }),
    prisma.vehicle.count({ where: { companyId, status: "ACTIVE" } }),
    prisma.job.count({ where: { companyId } }),
    prisma.job.groupBy({ by: ["status"], where: { companyId }, _count: { _all: true } }),
    prisma.job.count({
      where: { companyId, scheduledAt: { gte: startOfToday, lt: startOfTomorrow } },
    }),
    prisma.notification.count({ where: { companyId, isRead: false } }),
  ]);

  const jobStatusCounts = Object.fromEntries(
    jobsByStatus.map((entry) => [entry.status, entry._count._all])
  );

  return {
    drivers: { total: totalDrivers, active: activeDrivers, inactive: totalDrivers - activeDrivers },
    vehicles: { total: totalVehicles, active: activeVehicles, inactive: totalVehicles - activeVehicles },
    jobs: { total: totalJobs, today: jobsToday, byStatus: jobStatusCounts },
    unreadNotifications,
  };
}
