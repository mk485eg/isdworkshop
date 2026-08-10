import { prisma } from "../../lib/prisma";

export async function getDailyReport(companyId: string, dateStr?: string) {
  const date = dateStr ? new Date(`${dateStr}T00:00:00.000Z`) : new Date();
  const startOfDay = new Date(date);
  startOfDay.setUTCHours(0, 0, 0, 0);
  const endOfDay = new Date(startOfDay);
  endOfDay.setUTCDate(endOfDay.getUTCDate() + 1);

  const jobs = await prisma.job.findMany({
    where: { companyId, scheduledAt: { gte: startOfDay, lt: endOfDay } },
    include: { driver: true, vehicle: true },
    orderBy: { scheduledAt: "asc" },
  });

  const summary = jobs.reduce(
    (acc, job) => {
      acc.total += 1;
      acc.byStatus[job.status] = (acc.byStatus[job.status] ?? 0) + 1;
      return acc;
    },
    { total: 0, byStatus: {} as Record<string, number> }
  );

  return {
    date: startOfDay.toISOString().slice(0, 10),
    summary,
    jobs,
  };
}
