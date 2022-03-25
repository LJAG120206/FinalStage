
import React, {useEffect, useState} from "react";
import Axios from 'axios';
import NavCustomerSuccess from "../CustomersSuccess/NavCustomerSuccess";


const ClientsListe = props => {
    console.log(props)
    const [clients, setClients] = useState([]);

useEffect(()=>{
 Axios
    .get("https://127.0.0.1:8000/api/clients")
    .then(response => response.data["hydra:member"])
    .then(data => setClients(data))
}, []);
console.log(clients)

    return ( 
    <>
        <NavCustomerSuccess id={localStorage.id} />
        <h2>Liste des clients</h2> 
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
                    <th>DATE DE CREATION</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {clients.map((client) => 
                    <tr key={client.id}>
                        <td>{client.prenom} {client.nom}</td>
                        <td>{client.adresse}</td>
                        <td>{client.codePostal}</td>
                        <td>{client.ville}</td>
                        <td>{client.telephone}</td>
                        <td>{client.activite}</td>
                        <td>{client.dateCreation}</td>
                    </tr>
                    )}
            </tbody>
        </table>
    </>
    );
}
 
export default ClientsListe;