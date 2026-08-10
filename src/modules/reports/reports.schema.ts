import { z } from "zod";

export const dailyReportQuerySchema = z.object({
  date: z
    .string()
    .regex(/^\d{4}-\d{2}-\d{2}$/, "date must be in YYYY-MM-DD format")
    .optional(),
});
export type DailyReportQuery = z.infer<typeof dailyReportQuerySchema>;
