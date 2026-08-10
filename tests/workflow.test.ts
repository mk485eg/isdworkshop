import request from "supertest";
import { app, authHeader, registerCompany, resetDatabase } from "./helpers";

beforeEach(async () => {
  await resetDatabase();
});

describe("core MVP workflow", () => {
  it("takes a job from creation through completion", async () => {
    const { token, companyId } = await registerCompany();
    const headers = authHeader(token);

    const companyRes = await request(app).get("/api/company").set(headers);
    expect(companyRes.status).toBe(200);
    expect(companyRes.body.id).toBe(companyId);

    const updateCompanyRes = await request(app)
      .patch("/api/company")
      .set(headers)
      .send({ phone: "555-9999" });
    expect(updateCompanyRes.status).toBe(200);
    expect(updateCompanyRes.body.phone).toBe("555-9999");

    const driverRes = await request(app)
      .post("/api/drivers")
      .set(headers)
      .send({ name: "Dana Driver", phone: "555-0200", licenseNumber: "DL-0001" });
    expect(driverRes.status).toBe(201);
    const driverId = driverRes.body.id;

    const vehicleRes = await request(app)
      .post("/api/vehicles")
      .set(headers)
      .send({ registrationNumber: "VAN-001", make: "Ford", model: "Transit", capacity: 12 });
    expect(vehicleRes.status).toBe(201);
    const vehicleId = vehicleRes.body.id;

    const jobRes = await request(app)
      .post("/api/jobs")
      .set(headers)
      .send({
        reference: "JOB-0001",
        pickupLocation: "Airport",
        dropoffLocation: "Hotel",
        scheduledAt: new Date().toISOString(),
      });
    expect(jobRes.status).toBe(201);
    const jobId = jobRes.body.id;
    expect(jobRes.body.status).toBe("PENDING");

    const assignRes = await request(app)
      .post(`/api/jobs/${jobId}/assign`)
      .set(headers)
      .send({ driverId, vehicleId });
    expect(assignRes.status).toBe(200);
    expect(assignRes.body.status).toBe("ASSIGNED");
    expect(assignRes.body.driverId).toBe(driverId);
    expect(assignRes.body.vehicleId).toBe(vehicleId);

    const acceptRes = await request(app).post(`/api/jobs/${jobId}/accept`).set(headers);
    expect(acceptRes.status).toBe(200);
    expect(acceptRes.body.status).toBe("ACCEPTED");

    const startRes = await request(app).post(`/api/jobs/${jobId}/start`).set(headers);
    expect(startRes.status).toBe(200);
    expect(startRes.body.status).toBe("IN_PROGRESS");
    expect(startRes.body.startedAt).not.toBeNull();

    const completeRes = await request(app).post(`/api/jobs/${jobId}/complete`).set(headers);
    expect(completeRes.status).toBe(200);
    expect(completeRes.body.status).toBe("COMPLETED");
    expect(completeRes.body.completedAt).not.toBeNull();

    const dashboardRes = await request(app).get("/api/dashboard/stats").set(headers);
    expect(dashboardRes.status).toBe(200);
    expect(dashboardRes.body.jobs.byStatus.COMPLETED).toBe(1);
    expect(dashboardRes.body.drivers.total).toBe(1);
    expect(dashboardRes.body.vehicles.total).toBe(1);

    const notificationsRes = await request(app).get("/api/notifications").set(headers);
    expect(notificationsRes.status).toBe(200);
    const types = notificationsRes.body.map((n: { type: string }) => n.type);
    expect(types).toEqual(
      expect.arrayContaining(["JOB_ASSIGNED", "JOB_ACCEPTED", "JOB_STARTED", "JOB_COMPLETED"])
    );

    const reportRes = await request(app)
      .get(`/api/reports/daily?date=${new Date().toISOString().slice(0, 10)}`)
      .set(headers);
    expect(reportRes.status).toBe(200);
    expect(reportRes.body.summary.total).toBe(1);
  });

  it("rejects invalid job status transitions", async () => {
    const { token } = await registerCompany();
    const headers = authHeader(token);

    const jobRes = await request(app)
      .post("/api/jobs")
      .set(headers)
      .send({
        reference: "JOB-BAD",
        pickupLocation: "A",
        dropoffLocation: "B",
        scheduledAt: new Date().toISOString(),
      });
    const jobId = jobRes.body.id;

    const startRes = await request(app).post(`/api/jobs/${jobId}/start`).set(headers);
    expect(startRes.status).toBe(409);
  });

  it("can deactivate a driver and it no longer appears assignable", async () => {
    const { token } = await registerCompany();
    const headers = authHeader(token);

    const driverRes = await request(app)
      .post("/api/drivers")
      .set(headers)
      .send({ name: "Dana Driver", phone: "555-0200", licenseNumber: "DL-0001" });
    const driverId = driverRes.body.id;

    const vehicleRes = await request(app)
      .post("/api/vehicles")
      .set(headers)
      .send({ registrationNumber: "VAN-001", make: "Ford", model: "Transit", capacity: 12 });
    const vehicleId = vehicleRes.body.id;

    const deactivateRes = await request(app).post(`/api/drivers/${driverId}/deactivate`).set(headers);
    expect(deactivateRes.status).toBe(200);
    expect(deactivateRes.body.status).toBe("INACTIVE");

    const jobRes = await request(app)
      .post("/api/jobs")
      .set(headers)
      .send({
        reference: "JOB-0002",
        pickupLocation: "A",
        dropoffLocation: "B",
        scheduledAt: new Date().toISOString(),
      });
    const jobId = jobRes.body.id;

    const assignRes = await request(app)
      .post(`/api/jobs/${jobId}/assign`)
      .set(headers)
      .send({ driverId, vehicleId });
    expect(assignRes.status).toBe(400);
  });
});

describe("multi-tenant isolation", () => {
  it("prevents company A from reading company B's drivers and jobs", async () => {
    const companyA = await registerCompany("-a");
    const companyB = await registerCompany("-b");

    const driverRes = await request(app)
      .post("/api/drivers")
      .set(authHeader(companyA.token))
      .send({ name: "A Driver", phone: "555-0001", licenseNumber: "DL-A" });
    const driverId = driverRes.body.id;

    const getFromB = await request(app)
      .get(`/api/drivers/${driverId}`)
      .set(authHeader(companyB.token));
    expect(getFromB.status).toBe(404);

    const listFromB = await request(app).get("/api/drivers").set(authHeader(companyB.token));
    expect(listFromB.status).toBe(200);
    expect(listFromB.body).toHaveLength(0);

    const companyFromB = await request(app).get("/api/company").set(authHeader(companyB.token));
    expect(companyFromB.body.id).toBe(companyB.companyId);
    expect(companyFromB.body.id).not.toBe(companyA.companyId);
  });

  it("rejects requests without a valid token", async () => {
    const res = await request(app).get("/api/drivers");
    expect(res.status).toBe(401);
  });
});
