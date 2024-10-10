import './App.css';
import './components/NavBar';
import './components/LoginForm';
import NavBar from './components/NavBar';
import LoginForm from './components/LoginForm';
import { Fragment } from 'react';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Home from './components/Home';
import { Link } from 'react-router-dom';
// import { Dropdown } from "@fluentui/react";
// import { Option } from "@fluentui/react-components";

import * as React from "react";
import {
  Dropdown,
  makeStyles,
  Option,
  useId,
} from "@fluentui/react-components";

function App() {



  return (
    <Fragment>
      <BrowserRouter>
      <NavBar></NavBar>
        <Routes> 
          <Route path="/" element={<Home />} />
          <Route path="/login" element={<LoginForm />} /> {/* Route de connexion */}
        </Routes>
    </BrowserRouter>
    </Fragment>
  
   
  
  )
}

export default App;
