import { Link, useParams } from "react-router-dom"
import { useEffect, useState } from "react"

const FetchUser = () => {
    return []
}
const FetchEventByProvider = (id)=>{
    return [].filter(e => e.provider_id == id)
}
const RenderEvent = (event) => {
    return (
        <div class="col-xl-3 col-sm-6 mb-3" key={event.id}>
            <div class="video-card">
                <div class="video-card-image">
                    <Link to={"/event/"+event.id}><img class="img-fluid" src={`/asset/img/${event.avatar}`} alt="" /></Link>
                    <div class="time">{event.start_date}</div>
                </div>
                <div class="video-card-body">
                    <div class="video-title">
                        <a href="#">{event.name}</a>
                    </div>
                    <Link className="video-page text-success" to={"/provider/"+event.provider_id}>
                        {event.provider_id} <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span>
                    </Link>
                    <div class="video-view">
                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    )
}
const ProviderDetail = () => {
    const params = useParams()
    const id = params.id
    const [provider,setProvider] = useState()
    const [events,setEvent]=useState([])
    // const provider =
    useEffect(()=>{
        setProvider(FetchUser().find(u => u.id == id))
        setEvent(FetchEventByProvider(id))
        console.log(events);
    },[])
    const renderEventList = events.map(e => RenderEvent(e))
    return (
        <div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image">
                <img class="img-fluid" alt="" src="/asset/img/channel-banner.png" />
                <div class="channel-profile">
                    <img class="channel-profile-img" alt="" src={"/asset/img/"+provider?.avatar} />

                </div>
            </div>
            <div class="single-channel-nav">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="channel-brand my-3" href="#">{provider?.name}<span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control form-control-sm mr-sm-1" type="search" placeholder="Search" aria-label="Search" /><button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> &nbsp;&nbsp;&nbsp; <button class="btn btn-outline-danger btn-sm" type="button">Subscribe <strong>1.4M</strong></button>
                        </form>
                    </div>
                </nav>
            </div>
            <div class="container-fluid">
                <div class="video-block section-padding">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title">
                                <div class="btn-group float-right right-action">
                                    <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                    </div>
                                </div>
                                <h6>Events</h6>
                            </div>
                        </div>
                        {renderEventList}

                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a tabindex="-1" href="#" class="page-link">Previous</a>
                            </li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item">
                                <a href="#" class="page-link">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>



        </div>
    )
}

export default ProviderDetail
