import { z } from "zod";

export const createJobSchema = z.object({
  reference: z.string().min(1),
  pickupLocation: z.string().min(1),
  dropoffLocation: z.string().min(1),
  scheduledAt: z.coerce.date(),
  notes: z.string().optional(),
});
export type CreateJobInput = z.infer<typeof createJobSchema>;

export const updateJobSchema = z.object({
  reference: z.string().min(1).optional(),
  pickupLocation: z.string().min(1).optional(),
  dropoffLocation: z.string().min(1).optional(),
  scheduledAt: z.coerce.date().optional(),
  notes: z.string().optional(),
});
export type UpdateJobInput = z.infer<typeof updateJobSchema>;

export const assignJobSchema = z.object({
  driverId: z.string().min(1),
  vehicleId: z.string().min(1),
});
export type AssignJobInput = z.infer<typeof assignJobSchema>;

export const jobReasonSchema = z.object({
  reason: z.string().min(1).optional(),
});
export type JobReasonInput = z.infer<typeof jobReasonSchema>;

export const listJobsQuerySchema = z.object({
  status: z
    .enum(["PENDING", "ASSIGNED", "ACCEPTED", "IN_PROGRESS", "COMPLETED", "FAILED", "CANCELLED"])
    .optional(),
});
export type ListJobsQuery = z.infer<typeof listJobsQuerySchema>;
