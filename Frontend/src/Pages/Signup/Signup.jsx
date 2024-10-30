import { useState } from 'react';
import './Signup.css'
import {Link} from "react-router-dom"
import useUser from '../../Hooks/User';

export const Signup = () => {
    const [name, setName] = useState("")
    const [email, setEmail] = useState("")
    const [password, setPassword] = useState("")
    const [role, setRole] = useState("employé")

    //Recuperation des functions d'action de l'utilisateur
    const {register} = useUser()

    //Cette fonction est executée lorsque l'utilisateur veut s'inscrire
    const createUser = (e) => {
        e.preventDefault()
        register(name, email, password,role)

        //Vider tous les champs de saisir
        setName("")
        setEmail("")
        setPassword("")
    }

    return (
        <div className="container-signup">
            <div className="wrapper">
                <form action="" onSubmit={createUser}>
                    <h1>Formulaire d'inscription</h1>

                    <label htmlFor="nom">Nom : </label>
                    <input type="text" value={name} onChange={(e) => setName(e.target.value)} className='form-control' required/>
                    <br />

                    <label htmlFor="email">Email : </label>
                    <input type="email" value={email} onChange={(e) => setEmail(e.target.value)} className='form-control' required/>
                    <br />

                    <label htmlFor="nom">Mot de passe : </label>
                    <input type="password" value={password} onChange={(e) => setPassword(e.target.value)} className='form-control' required/>
                    <br />

                    <label htmlFor="nom">Role : </label>
                    <select name="" id="" className='form-control' onChange={(e) => setRole(e.target.value)}>
                        <option value="employé">Employé</option>
                        <option value="entreprise">Entreprise</option>
                    </select>
                    <br />

                    <button type='submit'>S'inscrire</button>

                    <p>Avez-vous déjà un compte ? <Link to="/connexion">Connectez-vous</Link></p>
                </form>
            </div>
        </div>
    );
};
