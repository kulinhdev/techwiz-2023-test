import { Link, Outlet, useNavigate } from "react-router-dom";

export default function Navbar({ user, token, onClickLogout }) {
    const isLoggedIn = (
        <>
            <li className="nav-item dropdown no-arrow osahan-right-navbar-user">
                <a
                    className="nav-link dropdown-toggle user-dropdown-link"
                    href="#"
                    id="userDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <img alt="Avatar" src="asset/img/user.png" />
                    <span className="ml-2">{user?.name}</span>
                </a>
                <div
                    className="dropdown-menu dropdown-menu-right"
                    aria-labelledby="userDropdown"
                >
                    <a className="dropdown-item" href="account.html">
                        <i className="fas fa-fw fa-user-circle"></i> &nbsp; My
                        Account
                    </a>
                    <a className="dropdown-item" href="subscriptions.html">
                        <i className="fas fa-fw fa-video"></i> &nbsp;
                        Subscriptions
                    </a>
                    <a className="dropdown-item" href="settings.html">
                        <i className="fas fa-fw fa-cog"></i> &nbsp; Settings
                    </a>
                    <div className="dropdown-divider"></div>
                    <a
                        className="dropdown-item"
                        href="#"
                        data-toggle="modal"
                        data-target="#logoutModal"
                    >
                        <i className="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </>
    );
    const isNotLoggedIn = (
        <>
            {" "}
            <li className="nav-item dropdown no-arrow osahan-right-navbar-user">
                <span className="nav-link dropdown-toggle user-dropdown-link">
                    <Link to="/register">Register</Link>
                </span>
            </li>
            <li className="nav-item dropdown no-arrow osahan-right-navbar-user">
                <span className="nav-link dropdown-toggle user-dropdown-link">
                    <Link to="/login">Login</Link>
                </span>
            </li>
        </>
    );
    return (
        <nav className="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
            &nbsp;&nbsp;
            <button
                className="btn btn-link btn-sm text-secondary order-sm-0"
                id="sidebarToggle"
            >
                <i className="fas fa-bars"></i>
            </button>
            &nbsp;&nbsp;
            <Link className="navbar-brand mr-1" to={"/"}>
                <img className="img-fluid" src="/asset/img/logo.png" />
            </Link>
            <form className="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
                <div className="input-group">
                    <input
                        type="text"
                        className="form-control"
                        placeholder="Search for..."
                    />
                    <div className="input-group-append">
                        <button className="btn btn-light" type="button">
                            <i className="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <ul className="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
                <li className="nav-item dropdown no-arrow mx-1">
                    <a
                        className="nav-link dropdown-toggle"
                        href="#"
                        id="alertsDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i className="fas fa-bell fa-fw"></i>

                        <span className="badge badge-danger badge-counter">
                            8+
                        </span>
                    </a>

                    <div
                        className="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown"
                    >
                        <h6 className="dropdown-header">Notifications</h6>
                        <a
                            className="dropdown-item d-flex align-items-center"
                            href="#"
                        >
                            <div className="dropdown-list-image mr-3">
                                <img
                                    className="rounded-circle w-100"
                                    src="asset/img/s3.png"
                                />
                                <div className="status-indicator bg-warning"></div>
                            </div>
                            <div>
                                <div className="text-truncate">
                                    Quisque ac justo bibendum nunc fringilla
                                    pharetra nec sit amet mauris.
                                </div>
                                <div className="small text-gray-500">
                                    Morgan Alvarez · 2d
                                </div>
                            </div>
                        </a>
                        <a
                            className="dropdown-item text-center small text-gray-500"
                            href="#"
                        >
                            Show All Alerts
                        </a>
                    </div>
                </li>
                {user && token ? isLoggedIn : isNotLoggedIn}
            </ul>
        </nav>
    );
}
