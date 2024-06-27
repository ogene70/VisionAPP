import React,{useState,useEffect,StyleHTMLAttributes, Fragment} from "react";
import { Link } from "react-router-dom";
import { ColorClassNames, Dropdown } from "@fluentui/react";
import { Option, Select } from "@fluentui/react-components";

function NavBar(props){

    let options=["Connexion"]
    let styles={
     
        root: {
            // Stack the label above the field with a gap
            display: "grid",
            gridTemplateRows: "repeat(1fr)",
            justifyItems: "start",
            gap: "2px",
            width: "22vw",
            height:"3.13vh"
          }
     ,
     menu:{
        width:"15vw",
        height:"10vh"
     },
   
    }
   
    return (
        <Fragment  >
            <div id="nav" >
 <ul id="NavBar">
           <li><Link to="/"><img src="" alt="ESCANDE BALZAN SARL LOGO" width="25" height="25"></img></Link></li> 
            <i  class="fa-solid fa-circle-user  ">
            </i>
        </ul>
        <div className={styles.root}>
            <select
         style={styles.root}
           value="Menu"
         >
           {options.map((option) => (
             <option style={styles.option} key={option}>
               {option}
             </option>
           ))}
         </select>
        </div>
         

            </div>
           
    
        </Fragment>
        
    );
}

export default NavBar;