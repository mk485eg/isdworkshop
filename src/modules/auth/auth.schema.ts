import { z } from "zod";

export const registerSchema = z.object({
  companyName: z.string().min(1),
  companyEmail: z.string().email(),
  companyPhone: z.string().optional(),
  companyAddress: z.string().optional(),
  adminName: z.string().min(1),
  adminEmail: z.string().email(),
  password: z.string().min(8),
});
export type RegisterInput = z.infer<typeof registerSchema>;

export const loginSchema = z.object({
  email: z.string().email(),
  password: z.string().min(1),
});
export type LoginInput = z.infer<typeof loginSchema>;
