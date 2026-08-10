import { prisma } from "../../lib/prisma";
import { AppError } from "../../utils/AppError";
import { comparePassword, hashPassword } from "../../utils/password";
import { signAuthToken } from "../../utils/jwt";
import { LoginInput, RegisterInput } from "./auth.schema";

export async function registerCompanyAndAdmin(input: RegisterInput) {
  const existingCompany = await prisma.company.findUnique({ where: { email: input.companyEmail } });
  if (existingCompany) {
    throw AppError.conflict("A company with this email is already registered");
  }

  const existingUser = await prisma.user.findUnique({ where: { email: input.adminEmail } });
  if (existingUser) {
    throw AppError.conflict("A user with this email already exists");
  }

  const passwordHash = await hashPassword(input.password);

  const { company, user } = await prisma.$transaction(async (tx) => {
    const company = await tx.company.create({
      data: {
        name: input.companyName,
        email: input.companyEmail,
        phone: input.companyPhone,
        address: input.companyAddress,
      },
    });

    const user = await tx.user.create({
      data: {
        companyId: company.id,
        name: input.adminName,
        email: input.adminEmail,
        passwordHash,
        role: "ADMIN",
      },
    });

    return { company, user };
  });

  const token = signAuthToken({ userId: user.id, companyId: company.id, role: user.role });

  return {
    token,
    user: { id: user.id, name: user.name, email: user.email, role: user.role },
    company: { id: company.id, name: company.name, email: company.email },
  };
}

export async function login(input: LoginInput) {
  const user = await prisma.user.findUnique({ where: { email: input.email } });
  if (!user) {
    throw AppError.unauthorized("Invalid email or password");
  }

  const valid = await comparePassword(input.password, user.passwordHash);
  if (!valid) {
    throw AppError.unauthorized("Invalid email or password");
  }

  const token = signAuthToken({ userId: user.id, companyId: user.companyId, role: user.role });

  return {
    token,
    user: { id: user.id, name: user.name, email: user.email, role: user.role },
  };
}

export async function getCurrentUser(userId: string) {
  const user = await prisma.user.findUnique({
    where: { id: userId },
    include: { company: true },
  });
  if (!user) {
    throw AppError.notFound("User not found");
  }

  return {
    id: user.id,
    name: user.name,
    email: user.email,
    role: user.role,
    company: { id: user.company.id, name: user.company.name, email: user.company.email },
  };
}
