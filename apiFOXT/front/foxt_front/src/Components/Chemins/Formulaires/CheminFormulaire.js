import React, { useState, useEffect } from "react";
import FieldInput from "../../FieldInput/FieldInput";
import {useParams} from "react-router-dom"
import TexteArea from "../../TextArea/TexteArea";
import Select from "../../Select/Select";
import Axios from "axios";
import "./Formulaire.css";
import axios from "axios";
import NavCustomerSuccess from "../../CustomersSuccess/NavCustomerSuccess";
import { Link } from "react-router-dom";


//import Logo from "../Images/logo.png";


const CheminCreation = (props) => {
 
  let {id} = useParams();
 
  
  const [chemin, setChemin] = useState({
   
   
    titre: "",
    categories:"",
    expertActif: ""
    
    
 });
    const [liste_categories, setListe_categories] = React.useState([]);
    let categories;
    const [liste_experts, setListe_experts] = React.useState([]);
    let experts;
    const [credentials, setCredentials] = useState({
      message: "",
      mail: ""
  });


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
                console.log(chemin)
              })
    },[])

  const [editing, setEditing] = useState(false);

  const fetchChemin = async id => {
    try {
      const data = await axios
        .get("https://127.0.0.1:8000/api/chemins/" + id)
        .then(response => response.data);
        console.log(data);
        const {titre, status} = data;
        
        setChemin({status, titre});
        console.log(chemin)
    }
    catch (error){console.log(error.response);}
    
  }
  useEffect(()=>{
  if (id !== "new") {
    setEditing(true);
    fetchChemin(id)
   }
  }, [id]);
  
  const handleChange = ({ currentTarget }) => {
    const value = currentTarget.value;
    const name = currentTarget.name;
    setChemin({ ...chemin, [name]: value });
  };

  const handleCategoriesChange = ({ currentTarget }) => {
    const value = currentTarget.value;
    const name = currentTarget.name;
    setChemin({ ...chemin, [name]: value });
      Axios
              .get("https://127.0.0.1:8000/api/categories/"+value+"/experts")
              .then(response => response.data["hydra:member"])
              .then(experts => 
                { 
                  console.log(experts);             
                  let liste_exp=[];
                    experts.forEach((item) =>{
                        liste_exp.push([item.id,  item.prenom+" "+item.nom]);
                    })
                    liste_exp.unshift([0,"Selectionner un expert"])
                    setListe_experts(liste_exp);
                    console.log(liste_exp);
                })
      
};

  const handleSubmit = async (event) => {
    event.preventDefault();
    
    console.log(chemin);
    
    delete(chemin.categories);
    chemin.expertActif = "https://127.0.0.1:8000/api/experts/"+chemin.expertActif;
    chemin.status = "ACTIF";
    console.log(chemin);
        
    try {
          const response = await Axios
          .put(
          "https://127.0.0.1:8000/api/chemins/" + id, chemin)

          /*Prevoir envoi mail vers l'expert mandate qui acceptera ou non la mission
          
          .then (
            console.log("test"),
            credentials.mail=["loic.lavernette@gmail.com"],
            credentials.message=["test message"],
            Axios
                .post("http://localhost/foxt_partage/FOXT/Mail/",credentials))
            */
        } 
    catch (error) 
        {
        console.log(error.response);}
        };
          
  return (
    <>
      <NavCustomerSuccess id={localStorage.id} />
      <div>
        <div className="row headerContainer">
         
          <div className="title fieldInput col-lg-8">OUVERTURE CHEMIN</div>
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
                value={chemin.categories}
                onChange={handleCategoriesChange}
              />

              <Select
                id="expert"
                className="select col-lg-4"
                name="expertActif"
                label="Expert"
                type="select"
                selected="M."
                options={liste_experts}
                value={chemin.expertActif}
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
