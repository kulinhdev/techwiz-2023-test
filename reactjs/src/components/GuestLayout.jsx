import { Navigate, Outlet } from "react-router-dom";
import { useStateContext } from "../context/ContextProvider";

import Scripts from "./Scripts";

export default function GuestLayout() {
    const {currentUser, token } = useStateContext();

    if (currentUser && token) {
        return <Navigate to="/" />;
    }

    return (
        <div className="login-main-body">
            {/* <Scripts /> */}
            <section className="login-main-wrapper">
                <div className="container-fluid pl-0 pr-0">
                    <div className="row justify-content-center no-gutters">
                        <div className="col-xl-5 p-5 bg-white full-height">
                            <Outlet />
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
}
