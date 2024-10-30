import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import {BrowserRouter as Router} from 'react-router-dom'
import App from './App.jsx'
import './index.css'
import '../public/bootstrap/css/bootstrap.min.css'
import '../public/bootstrap/js/bootstrap.bundle.js'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <Router>
        <App></App>
    </Router>
  </StrictMode>,
)
