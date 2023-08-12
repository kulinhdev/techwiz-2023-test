import { useState } from "react";
import api from "../services/api";
import { Link, useNavigate } from "react-router-dom";
import SweetAlert from "../components/SweetAlert";
const Register = () => {
    const bg = "/asset/images/bg_1.jpg";
    const [name, setName] = useState("");
    const [username, setUsername] = useState("");
    const [email, setEmail] = useState("");
    const [phoneNumber, setPhoneNumber] = useState("");
    const [password, setPassword] = useState("");
    const [cfPassword, setCfPassword] = useState("");
    const [message, setMessage] = useState(null);
    const navigate = useNavigate();

    const handleRegister = async (e) => {
        e.preventDefault();

        if (password != cfPassword) {
            console.log("Password doesn't match!");
            return;
        }

        try {
            const response = await api.post("/register", {
                name,
                username,
                phone: phoneNumber,
                email,
                password,
            });
            // Alert
            SweetAlert("Register successful, login to continue!");
            navigate("/login");
        } catch (error) {
            console.error("Registration failed:", error.response.data.message);
            setMessage(error.response.data.message);
        }
    };

    return (
        <div class="login-main-left">
            <div class="text-center mb-5 login-main-left-header pt-4">
                <img src="asset/img/favicon.png" class="img-fluid" alt="LOGO" />
                <h5 class="mt-3 mb-3">Welcome to StreamTrace</h5>
                {message && <p className="text-danger my-1">{message}</p>}
            </div>
            <form onSubmit={handleRegister}>
                <div class="form-group">
                    <label>Name</label>
                    <input
                        value={name}
                        onChange={(e) => setName(e.target.value)}
                        type="text"
                        placeholder="Enter name"
                        class="form-control"
                    />
                </div>
                <div class="form-group">
                    <label>User Name</label>
                    <input
                        value={username}
                        onChange={(e) => setUsername(e.target.value)}
                        type="text"
                        class="form-control"
                        placeholder="Enter username"
                    />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                        type="email"
                        class="form-control"
                        placeholder="Enter email"
                    />
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input
                        value={phoneNumber}
                        onChange={(e) => setPhoneNumber(e.target.value)}
                        type="text"
                        class="form-control"
                        placeholder="Enter phone number"
                    />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                        type="password"
                        class="form-control"
                        placeholder="Enter password"
                    />
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input
                        value={cfPassword}
                        onChange={(e) => setCfPassword(e.target.value)}
                        type="password"
                        class="form-control"
                        placeholder="Enter confirm password"
                    />
                </div>
                <div class="mt-4">
                    <button
                        type="submit"
                        class="btn btn-outline-primary btn-block btn-lg"
                    >
                        Sign Up
                    </button>
                </div>
            </form>
            <div class="text-center mt-5">
                <p class="light-gray">
                    Already have an Account? <Link to="/login">Sign In</Link>
                </p>
            </div>
        </div>
    );
};

export default Register;
