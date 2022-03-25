import React from "react";
import { Link } from "react-router-dom";
import logo from "../../Images/logo.png";
import "./Cs.css";

function NavCustomerSuccess(props) {
  return (
    <nav className="navbar">
      <nav className="navbar navbar-expand-lg navbar-light bg-light">
        <div className="container-fluid">
          <a className="navbar-brand" href="/cs">
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
              <li className="nav-item dropdown">
                <a
                  className="nav-link dropdown-toggle"
                  data-bs-toggle="dropdown"
                  href="#"
                  role="button"
                  aria-expanded="false"
                >
                  Créer
                </a>
                <ul className="dropdown-menu">
                  <li>
                    <Link className="dropdown-item" to={"/client/creation/"}>
                      Un client
                    </Link>
                  </li>
                  <li>
                    <Link className="dropdown-item" to={"/expert/creation/"}>
                      Un expert
                    </Link>
                  </li>
                  <li className="nav-item">
                    <Link className="dropdown-item" to={"/chemin/creation/"}>
                      Un chemin
                    </Link>
                  </li>
                </ul>
              </li>
              <li className="nav-item dropdown">
                <a
                  className="nav-link dropdown-toggle"
                  data-bs-toggle="dropdown"
                  href="#"
                  role="button"
                  aria-expanded="false"
                >
                  Liste
                </a>
                <ul className="dropdown-menu">
                  <li>
                    <Link className="dropdown-item" to={"/experts/liste/"}>
                      Experts
                    </Link>
                  </li>
                  <li>
                    <Link className="dropdown-item" to={"/clients/liste/"}>
                      Clients
                    </Link>
                  </li>
                </ul>
              </li>
            </div>
          </div>
        </div>
      </nav>
      <h1>INTERFACE CUSTOMERS SUCCESS</h1><hr />
    </nav>
  );
}

export default NavCustomerSuccess;
