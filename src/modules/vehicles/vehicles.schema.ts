import { z } from "zod";

export const createVehicleSchema = z.object({
  registrationNumber: z.string().min(1),
  make: z.string().min(1),
  model: z.string().min(1),
  capacity: z.number().int().positive(),
});
export type CreateVehicleInput = z.infer<typeof createVehicleSchema>;

export const updateVehicleSchema = z.object({
  registrationNumber: z.string().min(1).optional(),
  make: z.string().min(1).optional(),
  model: z.string().min(1).optional(),
  capacity: z.number().int().positive().optional(),
});
export type UpdateVehicleInput = z.infer<typeof updateVehicleSchema>;
