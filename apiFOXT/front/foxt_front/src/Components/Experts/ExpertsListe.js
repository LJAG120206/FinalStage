
import React, {useEffect, useState} from "react";
import Axios from 'axios';
import NavCustomerSuccess from "../CustomersSuccess/NavCustomerSuccess";

const ExpertsListe = (props) => {

    const [experts, setExperts] = useState([]);

    useEffect(()=>{
 Axios
    .get("https://127.0.0.1:8000/api/experts")
    .then(response => response.data["hydra:member"])
    .then(data => setExperts(data)
    
    )
}, []);
console.log(experts)

    return ( 
    <>
      <NavCustomerSuccess id={localStorage.id} />
        <h2>Liste des experts</h2> 
        <br /><hr /><br />
        <table className="table table-success table-striped">
            <thead>
                <tr>
                   <th>NOM</th>
                    <th>ADRESSE</th>
                    <th>CODE POSTAL</th>
                    <th>VILLE</th>
                    <th>TELEPHONE</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                {experts.map((expert) => 
                    <tr key={expert.id}>
                        <td>{expert.prenom} {expert.nom}</td>
                        <td>{expert.adresse}</td>
                        <td>{expert.codePostal}</td>
                        <td>{expert.ville}</td>
                        <td>{expert.telephone}</td>
                        <td>{expert.status}</td>
                    </tr>
                    )}
            </tbody>
        </table>
    </>
    );
}
 
export default ExpertsListe;