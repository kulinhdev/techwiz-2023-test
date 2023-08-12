import { useEffect } from "react";
import api from "../services/api";
import { useState } from "react";
import SweetAlert from "../components/SweetAlert";
import useScript from "../hooks/useScript";
import { useStateContext } from "../context/ContextProvider";
const Home = () => {
    const { user, token, setUser, setToken, notification } = useStateContext();
    const [categories, setCategories] = useState([]);
    const [events, setEvents] = useState([]);

    useEffect(() => {
        const getCategories = async () => {
            const response = await api.get("/categories");
            setCategories(response.data.categories);
        };

        const getMySubscribeEvents = async () => {
            const response = await api.get(`/my-subscribe-events/${user.id}`);
            setEvents(response.data.subscriptions_events);
        };

        console.log({ events });

        getCategories();
        getMySubscribeEvents();
    }, []);

    return (
        <div className="container-fluid pb-0">
            <div className="top-mobile-search">
                <div className="row">
                    <div className="col-md-12">
                        <form className="mobile-search">
                            <div className="input-group">
                                <input
                                    type="text"
                                    placeholder="Search for..."
                                    className="form-control"
                                />
                                <div className="input-group-append">
                                    <button
                                        type="button"
                                        className="btn btn-dark"
                                    >
                                        <i className="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div className="top-category section-padding mb-4">
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
                                    <i
                                        className="fa fa-ellipsis-h"
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
                                        <i className="fas fa-fw fa-times-circle"></i>
                                        &nbsp; Close
                                    </a>
                                </div>
                            </div>
                            <h6>Channels Categories</h6>
                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="owl-carousel owl-carousel-category">
                            {categories &&
                                categories.map((category) => {
                                    return (
                                        <div key={category.id} className="item">
                                            <div className="category-item">
                                                <a href="#">
                                                    <img
                                                        className="img-fluid"
                                                        src={category.image}
                                                    />
                                                    <h6>{category.name}</h6>
                                                </a>
                                            </div>
                                        </div>
                                    );
                                })}
                        </div>
                    </div>
                </div>
            </div>
            <hr />
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
                                        <i className="fas fa-fw fa-times-circle"></i>
                                        &nbsp; Close
                                    </a>
                                </div>
                            </div>
                            <h6>Subscription Events</h6>
                        </div>
                    </div>
                    {events &&
                        events.map((event) => {
                            return (
                                <div
                                    key={event.id}
                                    className="col-xl-3 col-sm-6 mb-3"
                                >
                                    <div className="video-card">
                                        <div className="video-card-image">
                                            <a href="#">
                                                <img
                                                    className="img-fluid"
                                                    src={event.image}
                                                />
                                            </a>
                                            <div className="time">
                                                {"$ "}
                                                {event.price}
                                            </div>
                                        </div>
                                        <div className="video-card-body">
                                            <div className="video-title">
                                                <a href="#">{event.name}</a>
                                            </div>
                                            <div className="video-page text-success my-2">
                                                <b>Category</b>:{" "}
                                                {event.category.name}
                                            </div>
                                            <div className="video-view">
                                                <span className="mr-3">
                                                    <i className="fas fa-eye mr-1"></i>
                                                    {event.total_subscriptions}{" "}
                                                    subs
                                                </span>
                                                <span className="text-right">
                                                    <i className="fas fa-calendar-alt mr-1"></i>
                                                    {event.start_time}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            );
                        })}
                </div>
            </div>
            <hr className="mt-0" />
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
                                        <i className="fas fa-fw fa-times-circle"></i>
                                        &nbsp; Close
                                    </a>
                                </div>
                            </div>
                            <h6>Popular Channels</h6>
                        </div>
                    </div>
                    <div className="col-xl-3 col-sm-6 mb-3">
                        <div className="channels-card">
                            <div className="channels-card-image">
                                <a href="#">
                                    <img
                                        className="img-fluid"
                                        src="asset/img/s1.png"
                                    />
                                </a>
                                <div className="channels-card-image-btn">
                                    <button
                                        type="button"
                                        className="btn btn-outline-danger btn-sm"
                                    >
                                        Subscribe
                                        <strong>1.4M</strong>
                                    </button>
                                </div>
                            </div>
                            <div className="channels-card-body">
                                <div className="channels-title">
                                    <a href="#">Channels Name</a>
                                </div>
                                <div className="channels-view">
                                    382,323 subscribers
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-3 col-sm-6 mb-3">
                        <div className="channels-card">
                            <div className="channels-card-image">
                                <a href="#">
                                    <img
                                        className="img-fluid"
                                        src="asset/img/s2.png"
                                    />
                                </a>
                                <div className="channels-card-image-btn">
                                    <button
                                        type="button"
                                        className="btn btn-outline-danger btn-sm"
                                    >
                                        Subscribe
                                        <strong>1.4M</strong>
                                    </button>
                                </div>
                            </div>
                            <div className="channels-card-body">
                                <div className="channels-title">
                                    <a href="#">Channels Name</a>
                                </div>
                                <div className="channels-view">
                                    382,323 subscribers
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-3 col-sm-6 mb-3">
                        <div className="channels-card">
                            <div className="channels-card-image">
                                <a href="#">
                                    <img
                                        className="img-fluid"
                                        src="asset/img/s3.png"
                                    />
                                </a>
                                <div className="channels-card-image-btn">
                                    <button
                                        type="button"
                                        className="btn btn-outline-secondary btn-sm"
                                    >
                                        Subscribed
                                        <strong>1.4M</strong>
                                    </button>
                                </div>
                            </div>
                            <div className="channels-card-body">
                                <div className="channels-title">
                                    <a href="#">
                                        Channels Name{" "}
                                        <span
                                            title
                                            data-placement="top"
                                            data-toggle="tooltip"
                                            data-original-title="Verified"
                                        >
                                            <i className="fas fa-check-circle"></i>
                                        </span>
                                    </a>
                                </div>
                                <div className="channels-view">
                                    382,323 subscribers
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-3 col-sm-6 mb-3">
                        <div className="channels-card">
                            <div className="channels-card-image">
                                <a href="#">
                                    <img
                                        className="img-fluid"
                                        src="asset/img/s4.png"
                                    />
                                </a>
                                <div className="channels-card-image-btn">
                                    <button
                                        type="button"
                                        className="btn btn-outline-danger btn-sm"
                                    >
                                        Subscribe
                                        <strong>1.4M</strong>
                                    </button>
                                </div>
                            </div>
                            <div className="channels-card-body">
                                <div className="channels-title">
                                    <a href="#">Channels Name</a>
                                </div>
                                <div className="channels-view">
                                    382,323 subscribers
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Home;
