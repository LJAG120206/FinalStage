import React, { useState, useEffect } from "react";
import FieldInput from "../FieldInput/FieldInput";
import TexteArea from "../TextArea/TexteArea";
import Select from "../Select/Select";
import Axios from "axios";
import "./Experts.css";
import NavCustomerSuccess from "../CustomersSuccess/NavCustomerSuccess";

const ExpertCreation = (props) => {
  const [user, setUser] = useState({
    email: "",
    password: "",
    roles: ["EXPERT"],
    nom: "",
    prenom: "",
  });

  const [expert, setExpert] = useState({
    email: "",
    password: "",
    role: ["EXPERT"],
    civilite: "M.",
    nom: "",
    prenom: "",
    telephone: "",
    adresse: "",
    codePostal: "",
    ville: "",
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
    categorie: ""
  });


  const [liste_categories, setListe_categories] = React.useState([]);
  let categories;

  React.useEffect(() =>
    {
    Axios
        .get("https://127.0.0.1:8000/api/categories")
        .then(response => response.data["hydra:member"])
        .then(categories => 
          { 
            console.log(categories);             
            let liste_cat=[];
              categories.forEach((item) =>{
                  liste_cat.push([item.id, item.titre]);
              })
              liste_cat.unshift([0,"Selectionner une catégorie"])
              setListe_categories(liste_cat);
              console.log(liste_cat);
          })
    },[])

  const handleChange = ({ currentTarget }) => {
    const value = currentTarget.value;
    const name = currentTarget.name;

    setUser({ ...user, [name]: value });
    setExpert({ ...expert, [name]: value });
  };

  const handleSubmit = async (event) => {
    event.preventDefault();
    let idUser;
    let urlUser = "";
    
    
    expert.categories = ["https://127.0.0.1:8000/api/categories/"+expert.categories];
    console.log(expert);
    try {
      const response = await 
    Axios.post(
        "https://127.0.0.1:8000/api/users",
        user
      ).then((response) => {
          idUser = response.data.id;
          urlUser = "https://127.0.0.1:8000/api/users/"+idUser;
          callbackSetExpert(urlUser);
        });
    } catch (error) {
        console.log(error.response);}
    };
    
    const callbackSetExpert = async (urlUser) => {
      let newExpert = {
        ...expert,
        user: urlUser
      };
      console.log(newExpert)
      Axios.post("https://127.0.0.1:8000/api/experts", newExpert);
  };

  
  return (
    <>
      <div id="expert">
      <NavCustomerSuccess id={localStorage.id} />

        <div className="row headerContainer">
          
          <h2 className="fieldInput col-lg-8">CREATION EXPERT FOXT</h2>
        </div>
        <form
          id="formulaire"
          className="container-fluid form"
          onSubmit={handleSubmit}
        >
          <div>
            <div className="row">
            <Select
                id="categories"
                className="select col-lg-4"
                name="categories"
                label="Catégories"
                type="select"
                selected=""
                options={liste_categories}
                value={expert.categories}
                onChange={handleChange}
              />
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
                value={expert.civilite}
                onChange={handleChange}
                error={errors.civilite}
              />
              <FieldInput
                id="prenom"
                className="fieldInput col-lg-4"
                label="Prénom"
                type="text"
                name="prenom"
                value={expert.prenom}
                onChange={handleChange}
                error={errors.prenom}
              />
              <FieldInput
                id="nom"
                className="fieldInput col-lg-4"
                label="Nom"
                type="text"
                name="nom"
                value={expert.nom}
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
                value={expert.adresse}
                onChange={handleChange}
                error={errors.adresse}
              />
              <FieldInput
                name="codePostal"
                id="codePostal"
                className="fieldInput col-lg-4"
                label="Code postal"
                type="text"
                value={expert.codePostal}
                onChange={handleChange}
                error={errors.codePostal}
              />
              <FieldInput
                name="ville"
                id="ville"
                className="fieldInput col-lg-4"
                label="Localité"
                type="text"
                value={expert.ville}
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
                value={expert.telephone}
                onChange={handleChange}
                error={errors.telephone}
              />
              <FieldInput
                name="email"
                id="email"
                className="fieldInput col-lg-6"
                label="Email"
                type="email"
                value={expert.email}
                onChange={handleChange}
                error={errors.email}
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
                value={expert.status}
                onChange={handleChange}
              />
              <FieldInput
                name="password"
                id="password"
                className="fieldInput col-lg-6"
                label="Votre mot de passe"
                type="password"
                value={expert.password}
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
                value={expert.presentation}
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
      </div>
    </>
  );
};

export default ExpertCreation;
