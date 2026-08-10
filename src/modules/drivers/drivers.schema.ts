import { z } from "zod";

export const createDriverSchema = z.object({
  name: z.string().min(1),
  phone: z.string().min(1),
  email: z.string().email().optional(),
  licenseNumber: z.string().min(1),
});
export type CreateDriverInput = z.infer<typeof createDriverSchema>;

export const updateDriverSchema = z.object({
  name: z.string().min(1).optional(),
  phone: z.string().min(1).optional(),
  email: z.string().email().nullable().optional(),
  licenseNumber: z.string().min(1).optional(),
});
export type UpdateDriverInput = z.infer<typeof updateDriverSchema>;
