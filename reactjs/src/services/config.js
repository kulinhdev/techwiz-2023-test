const configs = {
    development: {
        API_BASE_URL: "http://localhost:8000",
    },
    production: {
        API_BASE_URL: "https://bachkhoa-aptech.edu.vn",
    },
};

// Export env specific config
export default configs["development"];
