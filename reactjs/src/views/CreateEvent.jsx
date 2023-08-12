import { useEffect, useState } from "react";
import ReactDatePicker from "react-datepicker";
import api from "../services/api";
import SweetAlert from "../components/SweetAlert";
import { useStateContext } from "../context/ContextProvider";
import slugify from "react-slugify";
import { Navigate, useNavigate } from "react-router-dom";

const RenderCategoryOption = (category) => {
    return (
        <>
            <option key={category?.id} value={category?.id}>
                {category?.name}
            </option>
        </>
    );
};

const Validate = (name, detail, category, file, startDate) => {
    let err = { isError: false };
    if (name.length < 5) {
        err.name = true;
        err.isError = true;
    }
    if ((category == null) | undefined) {
        err.category = true;
        err.isError = true;
    }
    if ((file == null) | undefined) {
        err.avatar = true;
        err.isError = true;
    }
    if ((startDate == null) | undefined) {
        err.startDate = true;
        err.isError = true;
    }
    return err;
};
const CreateEvent = () => {
    const [name, setName] = useState("");
    const [detail, setDetail] = useState("");
    const [price, setPrice] = useState(0);
    const [startDate, setDate] = useState(new Date());
    const [category, setCategory] = useState("");
    const [categoryList, setCategoryList] = useState([]);
    const [uploaded, setUploaded] = useState(false);
    const [fileAvatar, setAvatar] = useState();
    const [avatarUrl, setAvatarUrl] = useState();
    const [err, setErr] = useState({});
    const { user } = useStateContext();
    const navigate = useNavigate();

    useEffect(() => {
        const getCategories = async () => {
            const response = await api.get("/categories");
            setCategoryList(response.data.categories);

            setCategory(categories.at(0)?.id);
        };

        getCategories();
    }, []);

    useEffect(() => {
        if (fileAvatar) setAvatarUrl(URL.createObjectURL(fileAvatar));
    }, fileAvatar);

    const renderCategory = categoryList.map((c) => RenderCategoryOption(c));

    const handleUploadEvent = async () => {
        if (uploaded) return;

        setUploaded(true);
        const valid = Validate(name, detail, category, fileAvatar, startDate);
        console.log(category);
        setErr(valid);
        if (valid.isError) {
            setUploaded(false);
            return;
        }
        let slug = slugify(name);
        let date = `${startDate.getFullYear()}-${startDate.getMonth()}-${startDate.getDay()} ${startDate.getHours()}:${startDate.getMinutes()}`;
        let body = {
            name,
            slug,
            price,
            description: detail,
            start_time: date,
            category_id: category,
            user_id: user.id,
            imageFile: fileAvatar,
        };
        console.log(body);
        const post = await api.post("/events", body, {
            headers: { "Content-Type": "multipart/form-data" },
        });
        if (post?.message?.match("Event created successfully")) {
            navigate("/edit_event/" + post.event.slug);
        }

        setUploaded(false);
    };

    return (
        <div className="container-fluid upload-details">
            <div className="row">
                <div className="col-lg-12">
                    <div className="main-title">
                        <h6>Create New Event</h6>
                    </div>
                </div>
                <div className="col-lg-12">
                    <div className="col-8 m-auto">
                        <div className="video-card-image">
                            <img className="img-fluid" src={avatarUrl} alt="" />
                        </div>
                    </div>
                </div>
                <div className="col-lg-12">
                    <div className="mt-4 text-center">
                        <label
                            className="btn btn-outline-primary"
                            htmlFor="uploading"
                        >
                            Upload Event Image
                        </label>
                        <input
                            type="file"
                            id="uploading"
                            hidden
                            onChange={(e) =>
                                setAvatar(e.target?.files?.item(0))
                            }
                        />
                        <p
                            className={
                                "text-red-600 my-1 " +
                                (err.avatar ? "block" : "hidden")
                            }
                        >
                            Event must have an avatar
                        </p>
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
                                    <input
                                        minLength={5}
                                        type="text"
                                        placeholder="Title"
                                        id="e1"
                                        className="form-control text-white"
                                        value={name}
                                        onChange={(v) =>
                                            setName(v.target.value)
                                        }
                                    />
                                    <p
                                        className={
                                            "text-red-600 my-1 " +
                                            (err.name ? "block" : "hidden")
                                        }
                                    >
                                        Title must be filled
                                    </p>
                                </div>
                            </div>
                            <div className="col-lg-3">
                                <div className="form-group">
                                    <label className="block">Event date</label>
                                    <div>
                                        <ReactDatePicker
                                            showTimeInput
                                            dateFormat="yyyy-MM-dd hh:mm"
                                            className="form-control text-white"
                                            selected={startDate}
                                            onChange={(e) => {
                                                setDate(e);
                                            }}
                                        ></ReactDatePicker>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-3">
                                <div className="form-group">
                                    <label htmlFor="e4">Category</label>
                                    <select
                                        id="e4"
                                        className="custom-select text-white"
                                        value={category}
                                        onChange={(e) => {
                                            console.log(e.target.value);
                                            setCategory(e.target.value);
                                            console.log(category);
                                        }}
                                    >
                                        {renderCategory}
                                    </select>
                                </div>
                            </div>

                            <div className="col-lg-3">
                                <div className="form-group">
                                    <label htmlFor="price">Price</label>
                                    <input
                                        type="number"
                                        placeholder="Title"
                                        id="price"
                                        className="form-control text-white"
                                        value={price}
                                        onChange={(v) =>
                                            setPrice(parseFloat(v.target.value))
                                        }
                                    />
                                    <p
                                        className={
                                            "text-red-600 my-1 " +
                                            (err.name ? "block" : "hidden")
                                        }
                                    >
                                        Title must be filled
                                    </p>
                                </div>
                            </div>
                            <div className="col-lg-12">
                                <div className="form-group">
                                    <label htmlFor="e2">Detail</label>
                                    <textarea
                                        rows="3"
                                        id="e2"
                                        name="e2"
                                        className="form-control text-white"
                                        placeholder="Event detail"
                                        onChange={(e) =>
                                            setDetail(e.target.value)
                                        }
                                        value={detail}
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="osahan-area text-center mt-3">
                        <button
                            className="btn btn-outline-primary"
                            onClick={handleUploadEvent}
                        >
                            Save Changes
                        </button>
                    </div>
                    <hr />
                    <div className="terms text-center">
                        <p className="mb-0">
                            There are many variations of passages of Lorem Ipsum
                            available, but the majority{" "}
                            <a href="#">Terms of Service</a> and{" "}
                            <a href="#">Community Guidelines</a>.
                        </p>
                        <p className="hidden-xs mb-0">
                            Ipsum is therefore always free from repetition,
                            injected humour, or non
                        </p>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default CreateEvent;
