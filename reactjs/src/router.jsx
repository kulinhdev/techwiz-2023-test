import { createBrowserRouter, Navigate } from "react-router-dom";
import Home from "./views/Home";
import About from "./views/About";
import Login from "./views/Login";
import Register from "./views/Register";
import NotFound from "./views/NotFound";
import DefaultLayout from "./components/DefaultLayout";
import GuestLayout from "./components/GuestLayout";
import Discovery from "./views/Discovery";
import EventDetail from "./views/EventDetail";
import ProviderDetail from "./views/ProviderDetail";
import CreateEvent from "./views/CreateEvent";
import Myself from "./views/Myself";
import EditEvent from "./views/EditEvent";

const router = createBrowserRouter([
    {
        path: "/",
        element: <DefaultLayout />,
        children: [
            {
                path: "/",
                element: <Navigate to="/home" />,
            },
            {
                path: "/home",
                element: <Home />,
            },
            {
                path: "/about",
                element: <About />,
            },
            {
                path: "/discovery",
                element: <Discovery/>
            },
            {
                path: "/event/:id",
                element: <EventDetail/>
            },
            {
                path: "/provider/:id",
                element: <ProviderDetail/>
            },
            {
                path: "/create_event",
                element: <CreateEvent/>
            },
            {
                path: "/edit_event/:id",
                element: <EditEvent/>
            },
            {
                path: "/my_self",
                element: <Myself/>
            }
        ],
    },
    {
        path: "/",
        element: <GuestLayout />,
        children: [
            {
                path: "/login",
                element: <Login />,
            },
            {
                path: "/register",
                element: <Register />,
            },
        ],
    },
    {
        path: "*",
        element: <NotFound />,
    },
]);

export default router;
