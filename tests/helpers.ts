import request from "supertest";
import { createApp } from "../src/app";
import { prisma } from "../src/lib/prisma";

export const app = createApp();

export async function resetDatabase() {
  await prisma.notification.deleteMany();
  await prisma.job.deleteMany();
  await prisma.vehicle.deleteMany();
  await prisma.driver.deleteMany();
  await prisma.user.deleteMany();
  await prisma.company.deleteMany();
}

interface RegisteredCompany {
  token: string;
  companyId: string;
  userId: string;
}

let counter = 0;

export async function registerCompany(nameSuffix = ""): Promise<RegisteredCompany> {
  counter += 1;
  const suffix = `${Date.now()}-${counter}${nameSuffix}`;
  const res = await request(app)
    .post("/api/auth/register")
    .send({
      companyName: `Test Co ${suffix}`,
      companyEmail: `company-${suffix}@example.com`,
      adminName: "Admin User",
      adminEmail: `admin-${suffix}@example.com`,
      password: "Password123!",
    });

  if (res.status !== 201) {
    throw new Error(`Failed to register company: ${res.status} ${JSON.stringify(res.body)}`);
  }

  return { token: res.body.token, companyId: res.body.company.id, userId: res.body.user.id };
}

export function authHeader(token: string) {
  return { Authorization: `Bearer ${token}` };
}
