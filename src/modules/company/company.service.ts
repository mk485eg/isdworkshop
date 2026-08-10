import { prisma } from "../../lib/prisma";
import { AppError } from "../../utils/AppError";
import { UpdateCompanyInput } from "./company.schema";

export async function getCompany(companyId: string) {
  const company = await prisma.company.findUnique({ where: { id: companyId } });
  if (!company) {
    throw AppError.notFound("Company not found");
  }
  return company;
}

export async function updateCompany(companyId: string, input: UpdateCompanyInput) {
  await getCompany(companyId);
  return prisma.company.update({ where: { id: companyId }, data: input });
}
