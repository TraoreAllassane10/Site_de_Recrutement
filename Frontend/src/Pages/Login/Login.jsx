import { useState } from "react"
import {Link} from "react-router-dom"
import useUser from "../../Hooks/User"

export const Login = () => {

    const [email, setEmail] = useState("")
    const [password, setPassword] = useState("")

    //Recuperation des functions d'action de l'utilisateur
    const {login} = useUser()

    //Cette fonction est executée lorsque l'utilisateur veut se connecter
    const authenicate = (e) => {
        e.preventDefault()
        login(email, password)

        //Vider tous les champs de saisir
        setEmail("")
        setPassword("")
    }

  return (
    <div className="container-signup">
            <div className="wrapper">
                <form action="" onSubmit={authenicate}>
                    <h1>Formulaire de connexion</h1>

                    <label htmlFor="email">Email : </label>
                    <input type="email" className="form-control" value={email} onChange={(e) => {setEmail(e.target.value)}} required/>
                    <br />

                    <label htmlFor="nom">Mot de passe : </label>
                    <input type="password" className="form-control" value={password} onChange={(e) => {setPassword(e.target.value)}} required/>
                    <br />

                    <button type="submit">Se connecter</button>

                    <p>Avez-vous n'avez pas de compte ? <Link to="/inscription">Inscrivez-vous</Link></p>
                </form>
            </div>
        </div>
  )
}
