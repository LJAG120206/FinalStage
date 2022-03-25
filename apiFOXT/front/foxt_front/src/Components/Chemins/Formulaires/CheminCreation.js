import React, { useState, useEffect } from "react";
import FieldInput from "../../FieldInput/FieldInput";
import Select from "../../Select/Select";
import Axios from "axios";
import "./Formulaire.css";
import NavCustomerSuccess from "../../CustomersSuccess/NavCustomerSuccess";

const CheminCreation = (props) => {
  
  const [chemin, setChemin] = useState({
   
    client: "",
    titre: "",
    status: "actif",
    
  });
  const [liste_clients, setListe_clients] = React.useState([]);

  let clients;

React.useEffect(() =>
    {
    Axios
        .get("https://127.0.0.1:8000/api/clients")
        .then(response => response.data["hydra:member"])
        .then(clients => 
          { 
            console.log(clients);             
            let liste_cli=[];
              clients.forEach((item) =>{
                  liste_cli.push([item.id, item.prenom+" "+item.nom]);
              })
              liste_cli.unshift([0,"Selectionner client"])
              setListe_clients(liste_cli);
              console.log(liste_cli);
          })


    },[])
  
  const handleChange = ({ currentTarget }) => {
    const value = currentTarget.value;
    const name = currentTarget.name;

    setChemin({ ...chemin, [name]: value });
  };

  const handleSubmit = async (event) => {
    event.preventDefault();
    
    console.log(chemin);
    chemin.client = "https://127.0.0.1:8000/api/clients/"+chemin.client;
    try {
      const response = await Axios.post(
        "https://127.0.0.1:8000/api/chemins",chemin)
        .then((response) => {
                    
        });
    } catch (error) {
        console.log(error.response);}
    };
      
  return (
    <>
      <div>
      <NavCustomerSuccess id={localStorage.id} />
        <div className="row headerContainer">
          
          <h2 className="fieldInput col-lg-8">NOUVEAU CHEMIN</h2>
        </div>
        <form
          id="formulaire-chemin"
          className="container-fluid form"
          onSubmit={handleSubmit}
        >
          <div>
            <div className="row">
            <Select
                name="status"
                id="Status"
                className="select col-lg-4"
                label="Status"
                type="select"
                options={[
                  ["actif", "Actif"],
                  ["inactif", "Inactif"],
                ]}
                value={chemin.status}
                onChange={handleChange}
              />
              <Select
                id="client"
                className="select col-lg-4"
                name="client"
                label="Client"
                type="select"
                selected=""
                options={liste_clients}
                value={chemin.client}
                onChange={handleChange}
              />
              <FieldInput
                id="titre"
                className="fieldInput col-lg-4"
                label="Titre"
                type="text"
                name="titre"
                value={chemin.titre}
                onChange={handleChange}
              />
              
            </div>
          </div>
          <input
            className="btn btn-secondary btn-lg"
            type="submit"
            value="Envoyer"
          />
        </form>
      </div>
    </>
  );
};

export default CheminCreation;
