import React from "react";
import "./CheminsInactifs.css";
import { useEffect, useState } from "react";
import Axios from "axios";


function CheminsInactifs() {

  const [liste_chemins, setListe_Chemins] = useState([]);

     useEffect(()=>{
       let dataToSave;
       let i = 0;
         Axios
            .get("https://127.0.0.1:8000/api/chemins")
            .then(response => response.data["hydra:member"])
            .then((data) => {
              setListe_Chemins(data);
              console.log(liste_chemins)
            });
            
            
            }
         , []);
    
         return ( 
          <>
              <h1>Liste des chemins</h1> 
              <table className="table table-success table-striped">
                  <thead>
                      <tr>
                          <th>id</th>
                          <th>Expert actif</th>
                          <th>Client</th>
                          <th>titre</th>
                          <th>STATUS</th>
                      </tr>
                  </thead>
                  <tbody>
                      {liste_chemins.map((chemin) => 
                          <tr key={chemin.id}>
                              <td>{chemin.id}</td>
                              <td>{chemin.expertActif}</td>
                              <td>{chemin.client.civilite}</td>
                              <td>{chemin.titre}</td>
                              <td>{chemin.status}</td>
                            
                              <td>
                                  <button className="btn btn-sm bt-danger">supprimer</button>
                              </td>
                          </tr>
                          )}
                  </tbody>
              </table>
          </>
          );

  // return (
  //   <>
  //     <div className="card m-5" id="cheminsInactifsCard">
  //       <div className="card-header">Les demandes de chemins à traîter :</div>
  //       <div className="card-body">
  //         <table className="container-fluid m-1">
  //           <thead>
  //             <tr>
  //               {/* <th>Client</th>
  //               <th>Civilité</th>
  //               <th>Nom</th> */}
  //               <th>Titre du chemin</th>
  //             </tr>
  //           </thead>
  //           <tbody>
  //             <tr>
  //               {/* <td>test</td>
  //               <td>test</td>
  //               <td>test</td> */}
  //               <td>test</td>
  //             </tr>
  //             <tr>
  //               {/* <td>test</td>
  //               <td>test</td>
  //               <td>test</td> */}
  //               <td>test</td>
  //             </tr>
  //           </tbody>
  //         </table>
  //       </div>
  //     </div>
  //   </>
  // );
}

export default CheminsInactifs;
