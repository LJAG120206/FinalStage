import React, { useState, useEffect } from "react";
import FieldInput from "../FieldInput/FieldInput";
import TexteArea from "../TextArea/TexteArea";
import Select from "../Select/Select";
import Axios from "axios";
import "./Clients.css";
import NavCustomerSuccess from "../CustomersSuccess/NavCustomerSuccess";
import { useParams } from "react-router-dom";

const ClientCreation = (props) => {
  const [user, setUser] = useState({
    email: "",
    password: "",
    roles: ["CLIENT"],
    nom: "",
    prenom: "",
  });

  const [client, setClient] = useState({
    customerSuccess:"4444",
    email: "",
    password: "",
    role: ["CLIENT"],
    civilite: "M.",
    nom: "",
    prenom: "",
    telephone: "",
    adresse: "",
    codePostal: "",
    ville: "",
    activite: "",
    siret: "",
    status: "actif",
    dateCreation: new Date(),
    presentation: "",
    user: "",
  });

  const [errors, setErrors] = useState({
    email: "",
    password: "",
    civilite: "",
    nom: "Le nom est obligatoire ",
    prenom: "",
    telephone: "",
    adresse: "",
    codePostal: "",
    ville: "",
    status: "actif",
    date_creation: "",
    presentation: "",
  });

  const handleChange = ({ currentTarget }) => {
    const value = currentTarget.value;
    const name = currentTarget.name;

    setUser({ ...user, [name]: value });
    setClient({ ...client, [name]: value });
  };

  const handleSubmit = async (event) => {
    event.preventDefault();
    let idUser;
    let urlUser = "";
    let urlCs = "";
    console.log(user);

    try {
      const response = await Axios.post(
        "https://127.0.0.1:8000/api/users",
        user
      ).then((response) => {
          idUser = response.data.id;
          urlUser = "https://127.0.0.1:8000/api/users/"+idUser;
          urlCs = "https://127.0.0.1:8000/api/customer_successes/"+localStorage.id;
          callbackSetclient(urlUser, urlCs);
        });
    } catch (error) {
        console.log(error.response);}
    };
    
    const callbackSetclient = async (urlUser, urlCs) => {
      let newclient = {...client,
        user: urlUser,
        customerSuccess: urlCs
      };
      console.log(newclient)
      Axios.post("https://127.0.0.1:8000/api/clients", newclient);
  };

  
  return (
    <>
        <NavCustomerSuccess id={localStorage.id} />
        <div>
            <h2>CREATION CLIENT FOXT</h2>
        </div>
        <form
          id="formulaire"
          className="container-fluid form mt-4 p-5"
          onSubmit={handleSubmit}
        >
          <div>
            <div className="row">
              <Select
                id="titre"
                className="select col-lg-4"
                name="civilite"
                label="Civilité"
                type="select"
                selected="M."
                options={[
                  ["M.", "Monsieur"],
                  ["Mme", "Madame"],
                  ["Melle", "Mademoiselle"],
                ]}
                value={client.civilite}
                onChange={handleChange}
                error={errors.civilite}
              />
              <FieldInput
                id="prenom"
                className="fieldInput col-lg-4"
                label="Prénom"
                type="text"
                name="prenom"
                value={client.prenom}
                onChange={handleChange}
                error={errors.prenom}
              />
              <FieldInput
                id="nom"
                className="fieldInput col-lg-4"
                label="Nom"
                type="text"
                name="nom"
                value={client.nom}
                onChange={handleChange}
                error={errors.nom}
              />
            </div>
            <div className="row">
              <FieldInput
                name="adresse"
                id="adresse"
                className="fieldInput col-lg-4"
                label="Adresse"
                type="text"
                value={client.adresse}
                onChange={handleChange}
                error={errors.adresse}
              />
              <FieldInput
                name="codePostal"
                id="codePostal"
                className="fieldInput col-lg-4"
                label="Code postal"
                type="text"
                value={client.codePostal}
                onChange={handleChange}
                error={errors.codePostal}
              />
              <FieldInput
                name="ville"
                id="ville"
                className="fieldInput col-lg-4"
                label="Localité"
                type="text"
                value={client.ville}
                onChange={handleChange}
                error={errors.ville}
              />
            </div>
            <div className="row">
              <FieldInput
                name="telephone"
                id="telephone"
                className="fieldInput col-lg-6"
                label="Téléphone"
                type="text"
                value={client.telephone}
                onChange={handleChange}
                error={errors.telephone}
              />
              <FieldInput
                name="email"
                id="email"
                className="fieldInput col-lg-6"
                label="Email"
                type="email"
                value={client.email}
                onChange={handleChange}
                error={errors.email}
              />
            </div>
            <div className="row">
            <FieldInput
                name="activite"
                id="activite"
                className="fieldInput col-lg-6"
                label="Votre activite"
                type="text"
                value={client.activite}
                onChange={handleChange}
                error={errors.activite}
              />
              <FieldInput
                name="siret"
                id="siret"
                className="fieldInput col-lg-6"
                label="Votre N° de Siret"
                type="text"
                value={client.siret}
                onChange={handleChange}
                error={errors.siret}
              />
            </div>
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
                value={client.status}
                onChange={handleChange}
              />
              <FieldInput
                name="password"
                id="password"
                className="fieldInput col-lg-6"
                label="Votre mot de passe"
                type="password"
                value={client.password}
                onChange={handleChange}
                error={errors.password}
              />
            </div>
            <div>
              <TexteArea
                name="presentation"
                id="presentation"
                className="textArea"
                label="Présentation"
                value={client.presentation}
                onChange={handleChange}
                error={errors.presentation}
              />
            </div>
          </div>
          <input
            className="btn btn-secondary btn-lg"
            type="submit"
            value="Envoyer"
          />
        </form>
    </>
  );
};

export default ClientCreation;
