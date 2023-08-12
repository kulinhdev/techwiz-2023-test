import axios from "axios";
import config from "./config";

const api = axios.create({
    baseURL: `${config.API_BASE_URL}/api`,
});

api.interceptors.request.use(
    async (config) => {
        const token = localStorage.getItem("token");
        config.headers.Authorization = `Bearer ${token}`;
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

api.interceptors.response.use(
    (response) => {
        return response.data;
    },
    (error) => {
        throw error;
    }
);

export default api;
