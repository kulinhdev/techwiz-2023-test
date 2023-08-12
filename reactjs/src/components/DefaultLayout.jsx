import { Link, Outlet, useNavigate } from "react-router-dom";
import { useStateContext } from "../context/ContextProvider";
import api from "../services/api";
import { useEffect } from "react";
import Navbar from "./Navbar";
import Footer from "./Footer";
import Sidebar from "./Sidebar";
import Scripts from "./Scripts";
import SweetAlert from "./SweetAlert";

export default function DefaultLayout() {
    const { user, token, setUser, setToken, notification } = useStateContext();
    const navigate = useNavigate();

    useEffect(() => {
        if (!(token && user)) {
            // Navigate to home page
            // navigate("/login");
        }
    }, []);

    const onLogout = (ev) => {
        ev.preventDefault();

        api.post("/logout").then(() => {

        });
        // Reset data
        setUser({});
        setToken(null);
        // Alert
        SweetAlert("Logout successful, bye!");
        // Navigate
        navigate("/login");
    };

    return (
        <div id="page-top">
            <Scripts />
            <Navbar user={user} token={token} />

            <div id="wrapper">
                <Sidebar />
                <div id="content-wrapper">
                    <Outlet />

                    <Footer />
                </div>
            </div>

            <a className="scroll-to-top rounded" href="#page-top">
                <i className="fas fa-angle-up"></i>
            </a>

            {/* Logout Modal */}
            <div
                className="modal fade"
                id="logoutModal"
                tabIndex="-1"
                role="dialog"
                aria-hidden="true"
            >
                <div className="modal-dialog modal-dialog-centered" role="document">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title" id="exampleModalLabel">
                                Ready to Leave?
                            </h5>
                            <button
                                className="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div className="modal-body">
                            Select "Logout" below if you are ready to end your
                            current session.
                        </div>
                        <div className="modal-footer">
                            <button
                                className="btn btn-secondary"
                                type="button"
                                data-dismiss="modal"
                            >
                                Cancel
                            </button>
                            <button
                                className="btn btn-primary"
                                type="button"
                                data-dismiss="modal"
                                onClick={onLogout}
                            >
                                Logout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
