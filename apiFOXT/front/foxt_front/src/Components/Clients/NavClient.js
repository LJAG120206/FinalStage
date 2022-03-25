import React from 'react';
import "./Clients.css";
import { Link } from 'react-router-dom';
import logo from "../../Images/logo.png";


function NavClient(props) {
  return (
    <>
        <nav className="navbar">
        <nav className="navbar navbar-expand-lg navbar-light bg-light">
            <div className="container-fluid">
            <a className="navbar-brand" href="/clients">
                <img src={logo} alt="Accueil FOXT" />
            </a>
            <button
                className="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div className="navbar-nav">
                <Link className="nav-link" to={"/client-profil/" + props.id}>
                    Mon profil
                </Link>
                <Link className="nav-link" to={"#"}>
                    Mon suivi de chemin
                </Link>
                </div>
            </div>
            </div>
        </nav>
        <h1>INTERFACE CLIENT</h1><hr />
        </nav>
        <hr />
    </>
  )
}

export default NavClient