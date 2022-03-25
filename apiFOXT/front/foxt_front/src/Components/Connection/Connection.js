import './Connection.css';
import React, { useState, useEffect } from 'react';
import Axios from 'axios';
import jwt_decode from 'jwt-decode';




const Connection = props => {
        console.log(props);

        const [credentials, setCredentials] = useState({
            username: "",
            password: ""
        });

        const [error, setError] = useState("");

    const handleChange = (event)=>{
        const value = event.currentTarget.value
        const name = event.currentTarget.name

        setCredentials({...credentials, [name]: value})
    }

    const handleSubmit = async event=>{
        event.preventDefault();
        console.log(credentials);
      let cle;
        try{
          const token = await Axios
            .post("https://127.0.0.1:8000/api/login_check", credentials)
            .then(response => cle =response.data.token)
            console.log(cle)
            let decoded = jwt_decode(token);

            localStorage.role = decoded.roles[0];
            localStorage.username = decoded.username;
            localStorage.prenom = decoded.prenom;
            localStorage.nom = decoded.nom;
            localStorage.idUser = decoded.id;
            localStorage.id = decoded.type2[0].id;
            console.log(localStorage.role)
              localStorage.role == "CS" && (window.location.href = "/cs");
              localStorage.role == "EXPERT" && (window.location.href = "/experts");
              localStorage.role == "CLIENT" && (window.location.href = "/clients");

            // .then(response => window.location.href = "/clients/liste/")

        // Stockage du token dans le local storage
        window.localStorage.setItem("authToken", token);
        // On prévient Axios qu'on a un header par défaut sur toutes nos futures requetes
        Axios.defaults.headers["Authorization"] = "Bearer " + token;

        

        } catch(error){
            console.log(error.response);
            setError("Aucun compte ne possède cette adresse");
        }
    }
    
    return (
    <>
       
        <section className="h-100 gradient-form" styles="background-color: #eee;">
  <div className="container py-5 h-100">
    <div className="row d-flex justify-content-center align-items-center h-100">
      <div className="col-xl-10">
        <div className="card rounded-3 text-black">
          <div className="row g-0">
            <div className="col-lg-6">
              <div className="card-body p-md-5 mx-md-4">

                <div className="text-center">
                  {/* <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo"></img> */}
                  <h4 className="mt-1 mb-5 pb-1">CONNEXION</h4>
                </div>
                <form onSubmit={handleSubmit}>
            <div className='form-group'>
                <label  htmlFor="username">Adresse email</label>
                <input 
                value={credentials.username} 
                onChange={handleChange}
                type="email" 
                placeholder="Adresse mail de connexion" 
                name="username" id="username"
                className={'form-control'+(error && "is-invalid")}
                />
                {error && <p className='invalid-feedback'>{error}</p>}
            </div>
            <div className='form-group'>
                <label htmlFor="password">Mot de Passe</label>
                <input 
                value={credentials.password}
                onChange={handleChange}
                type="text" placeholder="Mot de passe" 
                name="password" id="password"
                className='form-control'/>
                
            </div>
            <div className='form-group'>
                <button type="submit" className='btn btn-success'>
                Je me connecte
                </button>
            </div>
        </form> 
                

              </div>
            </div>
            <div className="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div className="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 className="mb-4">FOR A BETTER NEXT</h4>
                <p className="small mb-0">1er Cabinet de conseil français à vous accompagner dans vos projets de transformation de façon illimité.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </>
    );
}

export default Connection;
