import { createContext, useContext, useState } from "react";

const StateContext = createContext({
    currentUser: null,
    token: null,
    notification: null,
    setUser: () => {},
    setToken: () => {},
    setNotification: () => {},
});

export const ContextProvider = ({ children }) => {
    const [user, setUser] = useState(() =>
        JSON.parse(localStorage.getItem("user"))
    );
    const [token, setToken] = useState(localStorage.getItem("token"));
    const [notification, setNotification] = useState("");

    const handleSetToken = (newToken) => {
        setToken(newToken);
        if (newToken) {
            localStorage.setItem("token", newToken);
        } else {
            localStorage.removeItem("token");
        }
    };

    const handleSetNotification = (message) => {
        setNotification(message);

        setTimeout(() => {
            setNotification("");
        }, 5000);
    };

    const contextValue = {
        user,
        setUser,
        token,
        setToken: handleSetToken,
        notification,
        setNotification: handleSetNotification,
    };

    return (
        <StateContext.Provider value={contextValue}>
            {children}
        </StateContext.Provider>
    );
};

export const useStateContext = () => useContext(StateContext);
