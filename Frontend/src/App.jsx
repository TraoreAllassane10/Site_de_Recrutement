import {Routes, Route} from 'react-router-dom'
import './App.css'
import { Signup } from './Pages/Signup/Signup'
import { Login } from './Pages/Login/Login'
import { Home } from './Pages/Home/Home'

function App() {


  return (
    <div className="container">
        <Routes>
        <Route path="/" element={<Home/>}/>
        <Route path="/connexion" element={<Login/>}/>
        <Route path="/inscription" element={<Signup/>}/>
    </Routes>
    </div>
  )
}

export default App
