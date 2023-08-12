import { useEffect, useState } from "react"
import { Link } from "react-router-dom"
import api from "../services/api"

const RenderEvent = (event) => {
    return (
        <div className="col-xl-3 col-sm-6 mb-3" key={event.id}>
            <Link className="video-card" to={"/event/"+event.slug}>
                <div className="video-card-image">
                    <div ><img className="img-fluid" src={`..\\${event.image}`} alt="" /></div>
                    <div className="time">{event.start_date}</div>
                </div>
                <div className="video-card-body">
                    <div className="video-title">
                        <a href="#">{event.name}</a>
                    </div>
                    <div className="video-page text-success">
                        {event.user.name} <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i className="fas fa-check-circle text-success"></i></a>
                    </div>
                    <div className="video-view">
                        {event.total_subscriptions} interested &nbsp;<i className="fas fa-calendar-alt"></i>
                    </div>
                    <div className="video-view">
                        {event.price} $ &nbsp;<i className="fas fa-calendar-alt"></i>
                    </div>
                    
                </div>
            </Link>
        </div>
    )
}
const FetchEventData = async () => {
    const fetch = await api.get("/events")
    if(fetch.status == 'success'){
        return fetch.data.events
    }else{
        return []
    }
}
const Discovery = () => {
    const [page, setPage] = useState(1)
    const [events, setEvents] = useState([])
    const [search, setSearch] = useState("")
    const [sort, setSort] = useState("id asc")
    useEffect(() => {
        const asyncCall = async ()=>{
            setEvents(await FetchEventData())
        }
        asyncCall()
    }, [])
    const handleSearch = ()=>{}
    const renderEventList = events.map(e => RenderEvent(e))
    return (
        <>
            <div className="container-fluid pb-0">
                <div className="single-channel-nav mb-2">
                    <nav className="navbar navbar-expand-lg navbar-light">
                        <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span className="navbar-toggler-icon"></span>
                        </button>
                        <div className="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul className="navbar-nav mr-auto">
                                <li className="nav-item active">
                                    <a className="nav-link" href="#">Videos <span className="sr-only">(current)</span></a>
                                </li>
                                <li className="nav-item">
                                    <a className="nav-link" href="#">Playlist</a>
                                </li>
                                <li className="nav-item">
                                    <a className="nav-link" href="#">Channels</a>
                                </li>
                                <li className="nav-item">
                                    <a className="nav-link" href="#">Discussion</a>
                                </li>
                                <li className="nav-item">
                                    <a className="nav-link" href="#">About</a>
                                </li>
                                <li className="nav-item dropdown">
                                    <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Donate
                                    </a>
                                    <div className="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a className="dropdown-item" href="#">Action</a>
                                        <a className="dropdown-item" href="#">Another action</a>
                                        <div className="dropdown-divider"></div>
                                        <a className="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                            <form className="form-inline my-2 my-lg-0">
                                <input className="form-control form-control-sm mr-sm-1" type="search" placeholder="Search" aria-label="Search" onChange={(e)=>setSearch(e)} />
                                <button className="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit" onClick={handleSearch}>
                                    <i className="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </nav>
                </div>
                <div className="video-block section-padding">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="main-title">
                                <div className="btn-group float-right right-action">
                                    <a href="#" className="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by <i className="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <div className="dropdown-menu dropdown-menu-right">
                                        <a className="dropdown-item" href="#"><i className="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                        <a className="dropdown-item" href="#"><i className="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                        <a className="dropdown-item" href="#"><i className="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                    </div>
                                </div>
                                <h6>Videos</h6>
                            </div>
                        </div>
                        {renderEventList}
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul className="pagination justify-content-center pagination-sm mb-0">
                            <li className="page-item disabled">
                                <a tabIndex="-1" href="#" className="page-link">Previous</a>
                            </li>
                            <li className="page-item active"><a href="#" className="page-link">1</a></li>
                            <li className="page-item"><a href="#" className="page-link">2</a></li>
                            <li className="page-item"><a href="#" className="page-link">3</a></li>
                            <li className="page-item">
                                <a href="#" className="page-link">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </>
    )
}

export default Discovery