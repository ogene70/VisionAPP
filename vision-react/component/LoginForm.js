import React,{useState,useEffect,StyleHTMLAttributes} from "react";

function loginForm(props){
    return (
    <div>
        <form method="post" action="">
            <input type="email" name="email" placeholder="Votre email" id="" pattern="" required></input>
            <input type="password" name="mdp" placeholder="Votre mot de passe" id=""required></input>
            <input type="submit" name="" placeholder="" id=""></input>
        </form>
    </div>)
}
export default loginForm;