require("dotenv").config();

const env = process.env.ENV as "production" | "development" | "test" | undefined;

export default {
    enviroment: env ? env : "development",
    port: 3000,
    jwtSecret: "s4e5r6t9j"
}