import { useState } from "react";
import api from "../services/api";
import { useStateContext } from "../context/ContextProvider";
import axios from "axios";
import config from "../services/config";
import { Link, useNavigate } from "react-router-dom";
import SweetAlert from "../components/SweetAlert";
const Login = () => {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const { setUser, setToken } = useStateContext();
    const [message, setMessage] = useState(null);
    const navigate = useNavigate();

    const handleLogin = async (e) => {
        e.preventDefault();
        try {
            // Authenticate SPA
            await axios
                .get(`${config.API_BASE_URL}/sanctum/csrf-cookie`)
                .then((response) => {
                    console.log(response);
                });
            // Request login
            const response = await api.post("/login", {
                email,
                password,
            });

            if (response.status == "success") {
                const { user, token } = response.data;
                // Save user
                localStorage.setItem("user", JSON.stringify(user));
                setUser(user);
                setToken(token);
                // Alert
                SweetAlert("Welcome, login successful!");
                navigate("/");
            }
        } catch (error) {
            console.error("Login failed:", error.response.data.message);
            setMessage(error.response.data.message);
        }
    };

    return (
        <div class="login-main-left">
            <div class="text-center mb-4 login-main-left-header pt-4">
                <img src="asset/img/favicon.png" class="img-fluid" alt="LOGO" />
                <h5 class="mt-3 mb-3">Welcome to StreamTrace</h5>
                {message && <p className="text-danger my-1">{message}</p>}
            </div>
            <form onSubmit={handleLogin}>
                <div class="form-group">
                    <label>Email</label>
                    <input
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter email"
                    />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                        type="password"
                        class="form-control"
                        placeholder="Password"
                    />
                </div>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-12">
                            <button
                                type="submit"
                                class="btn btn-outline-primary btn-block btn-lg"
                            >
                                Sign In
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center mt-5">
                <p class="light-gray">
                    Don’t have an account? <Link to="/register">Sign Up</Link>
                </p>
            </div>
        </div>
    );
};

export default Login;
