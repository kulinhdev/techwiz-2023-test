import { Link, useParams } from "react-router-dom";
import { useEffect, useState } from "react";
import { useStateContext } from "../context/ContextProvider";
import api from "../services/api";
import EventCard from "../components/EventCard";

const MySelf = () => {
    const { user } = useStateContext();
    const [subscribeEvents, setSubscribeEvents] = useState([]);
    const [myEvents, setMyEvents] = useState([]);
    const [historyEvents, setHistoryEvents] = useState([]);
    const [activeTab, setActiveTab] = useState("subEvents");

    const tabs = {
        subEvents: () => renderEventList(subscribeEvents),
        myEvents: () => renderEventList(myEvents),
        history: () => renderEventList(historyEvents),
    };

    const getSubscribeEvents = async () => {
        const response = await api.get("my-subscribe-events/" + user.id);
        setSubscribeEvents(response.data.subscriptions_events);
    };

    const getMyEvents = async () => {
        const response = await api.get("my-events/" + user.id);
        setMyEvents(response.data.events);
    };

    const getHistoryEvents = async () => {
        const response = await api.get("my-old-events/" + user.id);
        setHistoryEvents(response.data.events);
    };

    const fetchData = () => {
        getSubscribeEvents();
        getMyEvents();
        getHistoryEvents();
    };

    fetchData();

    useEffect(() => {
        const asyncCall = async () => {
            setEvent(await fetchMySubscribeEvent(user));
        };
        asyncCall();
    }, []);

    const renderEventList = (events) => {
        return events ? (
            events.map((event) => EventCard(event))
        ) : (
            <h1>You don't have any events available!</h1>
        );
    };

    const handleChangeTab = (tab) => {
        setActiveTab(tab);
    };

    return (
        <div className="single-channel-page" id="content-wrapper">
            <div className="single-channel-image">
                <img
                    className="img-fluid"
                    src="/asset/img/channel-banner.png"
                />
                <div className="channel-profile">
                    <img className="channel-profile-img" src={user.avatar} />
                </div>
            </div>
            <div className="single-channel-nav">
                <nav className="navbar navbar-expand-lg navbar-light">
                    <p className="channel-brand my-3" href="#">
                        {user?.name}{" "}
                        <span
                            data-placement="top"
                            data-toggle="tooltip"
                            data-original-title="Verified"
                        >
                            <i className="fas fa-check-circle text-success"></i>
                        </span>
                    </p>
                    <div
                        className="collapse navbar-collapse"
                        id="navbarSupportedContent"
                    >
                        <ul className="navbar-nav mr-auto">
                            <li
                                class={
                                    "nav-item " +
                                    (activeTab == "subEvents" ? "active" : "")
                                }
                            >
                                <a
                                    className="nav-link cursor-pointer"
                                    onClick={() => handleChangeTab("subEvents")}
                                >
                                    Sub Events
                                </a>
                            </li>
                            <li
                                class={
                                    "nav-item " +
                                    (activeTab == "myEvents" ? "active" : "")
                                }
                            >
                                <a
                                    className="nav-link cursor-pointer"
                                    onClick={() => handleChangeTab("myEvents")}
                                >
                                    My Events
                                </a>
                            </li>
                            <li
                                class={
                                    "nav-item " +
                                    (activeTab == "history" ? "active" : "")
                                }
                            >
                                <a
                                    className="nav-link cursor-pointer"
                                    onClick={() => handleChangeTab("history")}
                                >
                                    History
                                </a>
                            </li>
                        </ul>

                        <button
                            className="btn btn-outline-danger btn-sm"
                            type="button"
                        >
                            Subscribe <strong>1.4M</strong>
                        </button>
                    </div>
                </nav>
            </div>
            <div className="container-fluid">
                <div className="video-block section-padding">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="main-title">
                                <div className="btn-group float-right right-action">
                                    <a
                                        href="#"
                                        className="right-action-link text-gray"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                        Sort by{" "}
                                        <i
                                            className="fa fa-caret-down"
                                            aria-hidden="true"
                                        ></i>
                                    </a>
                                    <div className="dropdown-menu dropdown-menu-right">
                                        <a className="dropdown-item" href="#">
                                            <i className="fas fa-fw fa-star"></i>{" "}
                                            &nbsp; Top Rated
                                        </a>
                                        <a className="dropdown-item" href="#">
                                            <i className="fas fa-fw fa-signal"></i>{" "}
                                            &nbsp; Viewed
                                        </a>
                                        <a className="dropdown-item" href="#">
                                            <i className="fas fa-fw fa-times-circle"></i>{" "}
                                            &nbsp; Close
                                        </a>
                                    </div>
                                </div>
                                <h6>Subscriptions Events</h6>
                            </div>
                        </div>
                        {/* Render tab */}
                        {tabs[activeTab] && tabs[activeTab]()}
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul className="pagination justify-content-center pagination-sm mb-0">
                            <li className="page-item disabled">
                                <a tabIndex="-1" href="#" className="page-link">
                                    Previous
                                </a>
                            </li>
                            <li className="page-item active">
                                <a href="#" className="page-link">
                                    1
                                </a>
                            </li>
                            <li className="page-item">
                                <a href="#" className="page-link">
                                    2
                                </a>
                            </li>
                            <li className="page-item">
                                <a href="#" className="page-link">
                                    3
                                </a>
                            </li>
                            <li className="page-item">
                                <a href="#" className="page-link">
                                    Next
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    );
};

export default MySelf;
