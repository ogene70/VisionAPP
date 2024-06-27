import React,{useState,useEffect} from "react";
import User from "./User";


function LoginForm(){
    const [landingPage, setlading] = useState([]) ;

    function Connexion(){
        let email=document.getElementById("email");
        let password=document.getElementById("password");
      console.log(email.value+'et'+password.value)

        
            let url="http://vision.test/api/login";
                let myHeaders = new Headers();
                let user=new User(email.value,password.value);
myHeaders.append("Content-Type", "application/json");
const fetchOptions = {
 method: "POST", 
 headers: myHeaders,
 body: JSON.stringify(user.toJSON())
};
            fetch(url,fetchOptions)
            .then((response) => {
            return response.json();
            })
            .then((dataJSON) => {
            console.log(dataJSON);
            
            })
            .catch((error) => console.log(error)); 

            
        }

    return (
        
    <div>
        
        <form >
            <input type="email" name="email" placeholder="Votre email" id="email" pattern="^[a-zA-Z]+\.[a-zA-Z]+@mma\.fr$" required></input>
            <input type="password" name="password" placeholder="Votre mot de passe" id="password" required></input>
            <input type="" name="" onClick={Connexion} placeholder="" id="" value="Se connecter" ></input>
        </form>
    </div>)
}
export default LoginForm;