import { Link, useParams } from "react-router-dom"
import api from "../services/api"
import { useStateContext } from "../context/ContextProvider"
import { useEffect, useState } from "react"
import SweetAlert from "../components/SweetAlert"
import Swal from "sweetalert2"

const FetchEvent = async (id) => {
    const fetch = await api.get("/events/"+id)
    console.log(fetch);
    if(fetch.status == 'success'){
        return fetch.data.event[0]
    }else{
        return null
    }
}
const FetchMySubscribe = async (user)=>{
    const fetch = await api.get("http://localhost:8000/api/my-subscribe-events/"+user.id)
    console.log(fetch);
    if(fetch.status == 'success'){
        return fetch.data.subscriptions_with_events
    }else{
        return []
    }
}
const ShowSubscriptionPlan=()=>{
    alert("sub plan")
}
const EventDetail = () => {
    const params = useParams()
    const id = params.id
    const [event,setEvent] = useState()
    const [isSubscribed,setIsSubscribe] = useState()
    const {user} = useStateContext()
    useEffect(()=>{
        const asyncCall = async ()=>{
            const data = await FetchEvent(id)
            const sub = await FetchMySubscribe(user)
            console.log(sub);
            const find = sub.find((e => e.id == data.id))
            if(data == null){
                SweetAlert("Null wtf")
            }else{
                setEvent(data)
            }
            // todo: get my subed event
            if(find) setIsSubscribe(true)
        }
        asyncCall()
    },[])
    const handleAddToWatchList = ()=>{
        
    }
    const handleSubscription = async ()=>{
        if(isSubscribed) return
        let confirm = await Swal.fire({
            title:"Confirm subscription",
            text:event.price+"$",
            showConfirmButton:true,
            showCancelButton:true,
        })
        if(confirm.isConfirmed){
            let body = {
                user_id:user.id,
                event_id:event.id,
                start_date:"2022-01-01 00:00",
                end_date:event.start_time
            }
            const post = await api.post("subscriptions",body)
            if(post.message?.match("Subscription created successfully")){
                setIsSubscribe(true)
            }
        }
    }
    return (<>
        <div className="container-fluid pb-0">
            <div className="video-block section-padding">
                <div className="row">
                    <div className="col-md-8">
                        <div className="single-video-left">
                            <div className="video-card-image">
                                <img className="img-fluid" src={`/asset/img/${event?.image}`} alt="" />
                            </div>
                            <div className="single-video-title box mb-3">
                                <div className="float-right">
                                    <button className="btn btn-outline-danger" style={(isSubscribed)?{background:"linear-gradient(135deg, #ff253a 0%, #ff8453 100%)"}:{}} type="button" onClick={handleSubscription}>
                                        {(isSubscribed)?
                                            (
                                                <i className="fas fa-check text-white"></i>
                                            ):
                                            (
                                                <i className="fas fa-plus"></i>
                                            )}
                                    </button>
                                    <button className="btn btn-outline-danger ml-3" type="button" onClick={handleAddToWatchList}><i className="fas fa-star"></i></button>
                                </div>
                                <h2>{event?.name}</h2>
                                <p className="mb-0"><i className="fas fa-eye"></i> 2,729,347 views</p>
                            </div>
                            <div className="single-video-author box mb-3">
                                <div className="float-right">
                                    <button className="btn btn-danger" type="button" onClick={ShowSubscriptionPlan}>Subscribe <strong>1.4M</strong></button> 
                                </div>
                                <img className="img-fluid" src={`/asset/img/${event?.user?.avatar?"":""}`} alt="" />
                                <p><Link to={"/provider/"+event?.user?.id}><strong>{event?.user?.username}</strong></Link> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i className="fas fa-check-circle text-success"></i></span></p>
                                <small>Published on Aug 10, 2020</small>
                            </div>
                            <div className="single-video-info-content box mb-3">
                                <h6 className="my-3">Date: <span>{event?.start_time}</span> </h6>
                                
                                <h6 className="my-3">Category : <span>{event?.category?.name}</span> </h6>
                                
                                <h6 className="my-3">Detail :</h6>
                                <p className="text-white">{event?.description}</p>
                                
                            </div>
                        </div>
                    </div>
                    <div className="col-md-4">
                        <div className="single-video-right">
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
                                        <h6>Up Next</h6>
                                    </div>
                                </div>
                                <div className="col-md-12">
                                    <div className="video-card video-card-list">
                                        <div className="video-card-image">
                                            <a className="play-icon" href="#"><i className="fas fa-play-circle"></i></a>
                                            <a href="#"><img className="img-fluid" src="/asset/img/v1.png" alt="" /></a>
                                            <div className="time">3:50</div>
                                        </div>
                                        <div className="video-card-body">
                                            <div className="btn-group float-right right-action">
                                                <a href="#" className="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i className="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div className="dropdown-menu dropdown-menu-right">
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                </div>
                                            </div>
                                            <div className="video-title">
                                                <a href="#">Here are many variati of passages of Lorem</a>
                                            </div>
                                            <div className="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i className="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div className="video-view">
                                                1.8M views &nbsp;<i className="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div className="video-card video-card-list">
                                        <div className="video-card-image">
                                            <a className="play-icon" href="#"><i className="fas fa-play-circle"></i></a>
                                            <a href="#"><img className="img-fluid" src="/asset/img/v2.png" alt="" /></a>
                                            <div className="time">3:50</div>
                                        </div>
                                        <div className="video-card-body">
                                            <div className="btn-group float-right right-action">
                                                <a href="#" className="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i className="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div className="dropdown-menu dropdown-menu-right">
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                </div>
                                            </div>
                                            <div className="video-title">
                                                <a href="#">Duis aute irure dolor in reprehenderit in.</a>
                                            </div>
                                            <div className="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i className="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div className="video-view">
                                                1.8M views &nbsp;<i className="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div className="video-card video-card-list">
                                        <div className="video-card-image">
                                            <a className="play-icon" href="#"><i className="fas fa-play-circle"></i></a>
                                            <a href="#"><img className="img-fluid" src="/asset/img/v3.png" alt="" /></a>
                                            <div className="time">3:50</div>
                                        </div>
                                        <div className="video-card-body">
                                            <div className="btn-group float-right right-action">
                                                <a href="#" className="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i className="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div className="dropdown-menu dropdown-menu-right">
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                </div>
                                            </div>
                                            <div className="video-title">
                                                <a href="#">Culpa qui officia deserunt mollit anim</a>
                                            </div>
                                            <div className="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i className="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div className="video-view">
                                                1.8M views &nbsp;<i className="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div className="video-card video-card-list">
                                        <div className="video-card-image">
                                            <a className="play-icon" href="#"><i className="fas fa-play-circle"></i></a>
                                            <a href="#"><img className="img-fluid" src="/asset/img/v4.png" alt="" /></a>
                                            <div className="time">3:50</div>
                                        </div>
                                        <div className="video-card-body">
                                            <div className="btn-group float-right right-action">
                                                <a href="#" className="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i className="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div className="dropdown-menu dropdown-menu-right">
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                </div>
                                            </div>
                                            <div className="video-title">
                                                <a href="#">Deserunt mollit anim id est laborum.</a>
                                            </div>
                                            <div className="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i className="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div className="video-view">
                                                1.8M views &nbsp;<i className="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div className="video-card video-card-list">
                                        <div className="video-card-image">
                                            <a className="play-icon" href="#"><i className="fas fa-play-circle"></i></a>
                                            <a href="#"><img className="img-fluid" src="/asset/img/v5.png" alt="" /></a>
                                            <div className="time">3:50</div>
                                        </div>
                                        <div className="video-card-body">
                                            <div className="btn-group float-right right-action">
                                                <a href="#" className="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i className="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div className="dropdown-menu dropdown-menu-right">
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                </div>
                                            </div>
                                            <div className="video-title">
                                                <a href="#">Exercitation ullamco laboris nisi ut.</a>
                                            </div>
                                            <div className="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i className="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div className="video-view">
                                                1.8M views &nbsp;<i className="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div className="video-card video-card-list">
                                        <div className="video-card-image">
                                            <a className="play-icon" href="#"><i className="fas fa-play-circle"></i></a>
                                            <a href="#"><img className="img-fluid" src="/asset/img/v6.png" alt="" /></a>
                                            <div className="time">3:50</div>
                                        </div>
                                        <div className="video-card-body">
                                            <div className="btn-group float-right right-action">
                                                <a href="#" className="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i className="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div className="dropdown-menu dropdown-menu-right">
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                </div>
                                            </div>
                                            <div className="video-title">
                                                <a href="#">There are many variations of passages of Lorem</a>
                                            </div>
                                            <div className="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i className="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div className="video-view">
                                                1.8M views &nbsp;<i className="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                    <div className="video-card video-card-list">
                                        <div className="video-card-image">
                                            <a className="play-icon" href="#"><i className="fas fa-play-circle"></i></a>
                                            <a href="#"><img className="img-fluid" src="/asset/img/v2.png" alt="" /></a>
                                            <div className="time">3:50</div>
                                        </div>
                                        <div className="video-card-body">
                                            <div className="btn-group float-right right-action">
                                                <a href="#" className="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i className="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div className="dropdown-menu dropdown-menu-right">
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                    <a className="dropdown-item" href="#"><i className="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                </div>
                                            </div>
                                            <div className="video-title">
                                                <a href="#">Duis aute irure dolor in reprehenderit in.</a>
                                            </div>
                                            <div className="video-page text-success">
                                                Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i className="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div className="video-view">
                                                1.8M views &nbsp;<i className="fas fa-calendar-alt"></i> 11 Months ago
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="fixed row align-middle justify-center hidden" style={{width:"100vw",height:'100vh',background:"rgba(0,0,0,0.4)",zIndex:1000,top:0,left:0}}>
                <div className="inline my-12 bg-gray-50 text-black text-center" style={{width:"50%"}}>
                    <h2 className="text-black ">Confirm subscription</h2>
                </div>
            </div>
        </div>
    </>)
}

export default EventDetail