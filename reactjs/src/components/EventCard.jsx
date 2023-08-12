import { Link } from "react-router-dom";

const EventCard = (event) => {
    return (
        <div key={event.id} className="col-xl-3 col-sm-6 mb-3">
            <Link to={"/edit_event/" + event.slug}></Link>
            <div className="video-card">
                <div className="video-card-image">
                    <img className="img-fluid" src={event.image} />
                    <div className="time p-1">
                        {"$ "}
                        {event.price}
                    </div>
                </div>
                <div className="video-card-body">
                    <div className="video-title">
                        <a href="#">{event.name}</a>
                    </div>
                    <div className="video-page text-success my-2">
                        <b>Category: </b>: {event.category.name}
                    </div>
                    {event.user && (
                        <div className="video-page text-primary my-2">
                            <b>Provider: </b>: {event.user.name}
                        </div>
                    )}
                    <div className="video-view">
                        <span className="mr-3">
                            <i className="fas fa-eye mr-1"></i>
                            {event.total_subscriptions} interested
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
};

export default EventCard;
