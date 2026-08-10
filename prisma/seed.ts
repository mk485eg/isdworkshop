import { PrismaClient } from "@prisma/client";
import { hashPassword } from "../src/utils/password";

const prisma = new PrismaClient();

async function main() {
  const passwordHash = await hashPassword("Password123!");

  const company = await prisma.company.upsert({
    where: { email: "admin@acmetransport.test" },
    update: {},
    create: {
      name: "Acme Transport",
      email: "admin@acmetransport.test",
      phone: "555-0100",
      address: "1 Fleet Way, Springfield",
    },
  });

  await prisma.user.upsert({
    where: { email: "admin@acmetransport.test" },
    update: {},
    create: {
      companyId: company.id,
      name: "Alex Admin",
      email: "admin@acmetransport.test",
      passwordHash,
      role: "ADMIN",
    },
  });

  const driver = await prisma.driver.upsert({
    where: { companyId_licenseNumber: { companyId: company.id, licenseNumber: "DL-0001" } },
    update: {},
    create: {
      companyId: company.id,
      name: "Dana Driver",
      phone: "555-0200",
      email: "dana@acmetransport.test",
      licenseNumber: "DL-0001",
      status: "ACTIVE",
    },
  });

  const vehicle = await prisma.vehicle.upsert({
    where: { companyId_registrationNumber: { companyId: company.id, registrationNumber: "VAN-001" } },
    update: {},
    create: {
      companyId: company.id,
      registrationNumber: "VAN-001",
      make: "Ford",
      model: "Transit",
      capacity: 12,
      status: "ACTIVE",
    },
  });

  await prisma.job.upsert({
    where: { companyId_reference: { companyId: company.id, reference: "JOB-0001" } },
    update: {},
    create: {
      companyId: company.id,
      reference: "JOB-0001",
      pickupLocation: "Springfield Airport",
      dropoffLocation: "Downtown Hotel",
      scheduledAt: new Date(),
      status: "PENDING",
    },
  });

  console.log("Seed complete:", { companyId: company.id, driverId: driver.id, vehicleId: vehicle.id });
}

main()
  .catch((err) => {
    console.error(err);
    process.exit(1);
  })
  .finally(async () => {
    await prisma.$disconnect();
  });
