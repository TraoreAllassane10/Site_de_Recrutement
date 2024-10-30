import axios from "axios";
import { useState } from "react";

export default function useUser()
{
    const [loading, setLoading] = useState(false)

    const register = async (name, email, password,role) => {
        setLoading(true)
        await axios.post("http://127.0.0.1:8000/api/register/",{name, email, password,role}).then((res) => {

            console.log(res.data);
            setLoading(true)
            setLoading(false)

        }).catch((error) => {
            console.log(error)
        })
    }

    const login = async (email, password) => {
        axios.post("http://127.0.0.1:8000/api/login/", {email,password}).then((res) => {
            console.log(res.data)
            localStorage.setItem("user_token", res.data.token)
        }).catch((error) => {
            console.log(error)
        })
    }

    return {
        register,
        login
    }
}
