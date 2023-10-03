require("dotenv").config();

const env = process.env.ENV as "production" | "development" | "test" | undefined;

export default {
    enviroment: env ? env : "development",
    port: 3000
}