import React from "react";
import "./CheminsInactifs.css";
import { useEffect, useState } from "react";
import Axios from "axios";
import { Link } from "react-router-dom";


function CheminsInactifs() {

  const [data, setData] = useState([]);

    useEffect(()=>{
        
        let CheminsInactifs = [];
        Axios
        .get("https://127.0.0.1:8000/api/chemins")
        .then(response => response.data["hydra:member"])
        .then(chemins => setData(chemins))

    }
    , []);
    
    // function chargerData(CheminsInactifs){
    //     let dataToSave = [];
    //     let i = 0;
    //     //console.log(CheminsInactifs);

    //     CheminsInactifs.forEach(chemin => {
    //         if (chemin.status === "INACTIF") {
    //             //console.log(chemin.titre);
    //             dataToSave[i].titre = chemin.titre;
    //             i++;
    //         }
    //     });
    //     console.log(dataToSave);
    //     //setData(dataToSave);
    // }
    console.log(data);

    
  return (
    <>
      <div className="card m-5" id="cheminsInactifsCard">
        <div className="card-header">Les demandes de chemins à traîter :</div>
        <div className="card-body">
          <table className="table table-striped container-fluid m-1">
            <thead>
              <tr>
                <th>Civilité</th>
                <th>Nom</th>
                <th>Titre du chemin</th>
              </tr>
            </thead>
            <tbody>
                {data.map((chemin) =>
                    (chemin.status === "INACTIF" && chemin.client.customerSuccess.id == localStorage.id ) &&
                    <tr key={chemin.id}>
                        
                            <td><Link to={"/chemin/"+chemin.id}>{chemin.client.civilite}</Link></td>
                            <td><Link to={"/chemin/"+chemin.id}>{chemin.client.nom}</Link></td>
                            <td><Link to={"/chemin/"+chemin.id}>{chemin.titre}</Link></td>
                        
                    </tr>
                )}
                </tbody>
          </table>
        </div>
      </div>
    </>
  );
}

export default CheminsInactifs;
