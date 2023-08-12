import { Link, useLocation } from "react-router-dom";

export default function Sidebar() {
    const location = useLocation();

    const isActiveRoute = (route) => {
        return location.pathname === route;
    };

    return (
        <ul className="sidebar navbar-nav">
            <li className={`nav-item ${isActiveRoute("/home") ? "active" : ""}`}>
                <Link className="nav-link" to={"/"}>
                    <i className="fas fa-fw fa-home"></i>
                    <span>Home</span>
                </Link>
            </li>
            <li
                className={`nav-item ${
                    isActiveRoute("/my_self") ? "active" : ""
                }`}
            >
                <Link className="nav-link" to={"/my_self"}>
                    <i className="fas fa-fw fa-user-alt"></i>
                    <span>My Channels</span>
                </Link>
            </li>
            <li
                className={`nav-item ${
                    isActiveRoute("/discovery") ? "active" : ""
                }`}
            >
                <Link className="nav-link" to={"/discovery"}>
                    <i className="fas fa-fw fa-video"></i>
                    <span>Discovery</span>
                </Link>
            </li>
            <li
                className={`nav-item ${
                    isActiveRoute("/create_event") ? "active" : ""
                }`}
            >
                <Link className="nav-link" to={"/create_event"}>
                    <i className="fas fa-fw fa-cloud-upload-alt"></i>
                    <span>Make an event</span>
                </Link>
            </li>
            <li
                className={`nav-item ${
                    isActiveRoute("/history") ? "active" : ""
                }`}
            >
                <Link className="nav-link" to={"/history"}>
                    <i className="fas fa-fw fa-history"></i>
                    <span>History Page</span>
                </Link>
            </li>
            <li className="nav-item dropdown">
                <a
                    className="nav-link dropdown-toggle"
                    href="categories.html"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <i className="fas fa-fw fa-list-alt"></i>
                    <span>Categories</span>
                </a>
                <div className="dropdown-menu">
                    <a className="dropdown-item" href="categories.html">
                        Movie
                    </a>
                    <a className="dropdown-item" href="categories.html">
                        Music
                    </a>
                    <a className="dropdown-item" href="categories.html">
                        Television
                    </a>
                </div>
            </li>
            <li
                className={`nav-item channel-sidebar-list ${
                    isActiveRoute("/subscriptions") ? "active" : ""
                }`}
            >
                <h6>SUBSCRIPTIONS</h6>
                <ul>
                    <li>
                        <a
                            href="subscriptions.html"
                            className={
                                isActiveRoute("/subscriptions") ? "active" : ""
                            }
                        >
                            <img className="img-fluid" src="asset/img/s1.png" />{" "}
                            Your Life
                        </a>
                    </li>
                    <li>
                        <a
                            href="subscriptions.html"
                            className={
                                isActiveRoute("/subscriptions") ? "active" : ""
                            }
                        >
                            <img className="img-fluid" src="asset/img/s2.png" />{" "}
                            Unboxing{" "}
                            <span className="badge badge-warning">2</span>
                        </a>
                    </li>
                    <li>
                        <a
                            href="subscriptions.html"
                            className={
                                isActiveRoute("/subscriptions") ? "active" : ""
                            }
                        >
                            <img className="img-fluid" src="asset/img/s3.png" />{" "}
                            Product / Service
                        </a>
                    </li>
                    <li>
                        <a
                            href="subscriptions.html"
                            className={
                                isActiveRoute("/subscriptions") ? "active" : ""
                            }
                        >
                            <img className="img-fluid" src="asset/img/s4.png" />{" "}
                            Gaming
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    );
}
