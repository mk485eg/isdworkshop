import { z } from "zod";

export const updateCompanySchema = z.object({
  name: z.string().min(1).optional(),
  phone: z.string().optional(),
  address: z.string().optional(),
});
export type UpdateCompanyInput = z.infer<typeof updateCompanySchema>;
