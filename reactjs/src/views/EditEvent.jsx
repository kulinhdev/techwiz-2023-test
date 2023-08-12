import { useEffect, useState } from "react"
import ReactDatePicker from "react-datepicker"
import api from "../services/api"
import SweetAlert from "../components/SweetAlert"
import { useStateContext } from "../context/ContextProvider"
import slugify from "react-slugify"
import { Navigate, useNavigate, useParams } from "react-router-dom"
const FetchCategory = async () => {
    let fetch = api.get("/categories")
    console.log(fetch);
    fetch = await fetch
    if(fetch.status == 'success'){
        return fetch.data.categories
    }else{
        console.log(fetch);
        return [];
    }
}

const FetchEvent = async (id) => {
    const fetch = await api.get("/events/"+id)
    if(fetch.status == 'success'){
        return fetch.data.event[0]
    }else{
        return null
    }
}

const RenderCategoryOption = (category) => {
    return (
        <>
            <option key={"category"+category?.id} value={category?.id}>{category?.name}</option>
        </>
    )
}
const Validate=(name,detail,category,file,startDate)=>{
    let err = {isError:false}
    if(name.length < 5){
        err.name = true
        err.isError = true
    }
    if(category == null|undefined){
        err.category = true
        err.isError = true
    }
    if(file == null|undefined){
        err.avata = true
        err.isError = true
    }
    if(startDate == null|undefined){
        err.startDate = true
        err.isError = true
    }
    return err
}
const EditEvent = () => {
    const params = useParams()
    const id = params.id
    const [event,setEvent] = useState()
    const [name, setName] = useState("")
    const [detail, setDetail] = useState("")
    const [price,setPrice] = useState(0)
    const [startDate, setDate] = useState(new Date())
    const [category, setCategory] = useState("")
    const [categoryList, setCategoryList] = useState([])
    const [uploaded, setUploaded] = useState(false)
    const [fileAvata, setAvata] = useState()
    const [avataUrl,setAvateUrl] = useState()
    const [err,setErr] = useState({})
    const {user} = useStateContext()
    const navigate = useNavigate();
    useEffect(() => {
        const asyncCall = async ()=>{
            const categories = await FetchCategory()
            const eventFetch = await FetchEvent(id)
            setEvent(eventFetch)
            setCategoryList(categories)
            setCategory(categories.find(c=>c.slug.match(eventFetch.category.slug))?.id)
            setName(eventFetch.name)
            setDetail(eventFetch.description)
            setAvateUrl(eventFetch.image)
            setDate(new Date(eventFetch.start_time))
            setPrice(eventFetch.price)
        }
        asyncCall()
    }, [])
    useEffect(()=>{
        if(fileAvata)
        if(fileAvata)
            setAvateUrl(URL.createObjectURL(fileAvata))
    },fileAvata)
    const renderCategory = categoryList.map(c => RenderCategoryOption(c))
    const handleUploadEvent = async () => {
        if (uploaded) return
        else {
            setUploaded(true)
            const valid = Validate(name,detail,category,fileAvata,startDate)
            console.log(category);
            setErr(valid)
            if(valid.isError){
                setUploaded(false)
                return
            }
            let slug = slugify(name)
            let date = `${startDate.getFullYear()}-${startDate.getMonth()}-${startDate.getDay()} ${startDate.getHours()}:${startDate.getMinutes()}`
            let body = {
                name,
                slug,
                price,
                description:detail,
                start_time:date,
                category_id:category,
                user_id:user.id,
                imageFile:fileAvata,
                _method:'PUT'
            }
            console.log(body);
            const post = await api.post("/events/"+event.id,body,{headers:{"Content-Type":"multipart/form-data"}})
            if(post?.message?.match("Event created successfully")){
                navigate("/edit_event/"+post.event.id)
            }
            setUploaded(false)
        }
    }
    return (
        <>
            <div className="container-fluid upload-details">
                <div className="row">
                    <div className="col-lg-12">
                        <div className="main-title">
                            <h6>Event Details</h6>
                        </div>
                    </div>
                    <div className="col-lg-12">
                        <div className="col-8 m-auto">
                            <div className="video-card-image">
                                <img className="img-fluid" src={avataUrl} alt="" />
                            </div>

                        </div>
                    </div>
                    <div className="col-lg-12">
                        <div className="mt-4 text-center">
                            <label className="btn btn-outline-primary" htmlFor="uploadimg">Upload Event Avata</label>
                            <input type="file" id="uploadimg" hidden onChange={e => setAvata(e.target?.files?.item(0))} />
                            <p className={"text-red-600 my-1 "+ ((err.avata)?"block":"hidden")}>Event must have an avatar</p>

                        </div>
                    </div>
                </div>
                <hr />
                <div className="row">
                    <div className="col-lg-12">
                        <div className="osahan-form">
                            <div className="row">
                                <div className="col-lg-12">
                                    <div className="form-group">
                                        <label htmlFor="e1">Event Title</label>
                                        <input minLength={5} type="text" placeholder="Title" id="e1" className="form-control text-white" value={name} onChange={v => setName(v.target.value)} />
                                        <p className={"text-red-600 my-1 "+ ((err.name)?"block":"hidden")}>Title must be filled</p>
                                    </div>
                                </div>
                                <div className="col-lg-3">
                                    <div className="form-group">
                                        <label className="block">Event date</label>
                                        <div>
                                            <ReactDatePicker showTimeInput dateFormat="yyyy-MM-dd hh:mm" className="form-control text-white" selected={startDate} onChange={e => {setDate(e)}}></ReactDatePicker>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-3">
                                    <div className="form-group">
                                        <label htmlFor="e4">Category</label>
                                        <select id="e4" className="custom-select text-white" value={category} onChange={e =>{console.log(e.target.value); setCategory(e.target.value);console.log(category); } }>
                                            {renderCategory}
                                        </select>
                                    </div>
                                </div>
                                
                                <div className="col-lg-3">
                                    <div className="form-group">
                                        <label htmlFor="price">Price</label>
                                        <input type="number" placeholder="Title" id="price" className="form-control text-white" value={price} onChange={v => setPrice(parseFloat(v.target.value) )} />
                                        <p className={"text-red-600 my-1 "+ ((err.name)?"block":"hidden")}>Title must be filled</p>
                                    </div>
                                </div>
                                <div className="col-lg-12">
                                    <div className="form-group">
                                        <label htmlFor="e2">Detail</label>
                                        <textarea rows="3" id="e2" name="e2" className="form-control text-white" placeholder="Event detail" onChange={e => setDetail(e.target.value)} value={detail}></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div className="osahan-area text-center mt-3">
                            <button className="btn btn-outline-primary" onClick={handleUploadEvent}>Save Changes</button>
                        </div>
                        <hr />
                    </div>
                </div>
            </div>
        </>
    )
}

export default EditEvent