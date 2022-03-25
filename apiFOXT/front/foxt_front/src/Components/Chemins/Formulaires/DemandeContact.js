import React, {useState} from 'react'
import FieldInput from '../../FieldInput/FieldInput'
import axios from 'axios';

function DemandeContact() 
{

    const [Contact, setContact] = useState({titre:""});

    const handleChange = ({ currentTarget }) =>{
        let newValue = {titre: currentTarget.value}
        setContact(newValue);
    }

    const handleSubmit = async (event) =>{
        event.preventDefault();

        let credentials = { ...Contact, client: "https://127.0.0.1:8000/api/clients/"+localStorage.id, status: "INACTIF"}

        try {
            const response = await axios.post("https://127.0.0.1:8000/api/chemins",credentials)
        }
        catch (error) {
            console.log(error.response);
        }
        
    }


  return (
      <>
        <div className="card m-5" id="cheminsInactifsCard">
            <div className="card-header">DemandeContact</div>
            <form className="card-body col-12 mt-2 m" onSubmit={handleSubmit}>
                <FieldInput 
                    id="titre"
                    className="fieldInput"
                    label="Titre de votre objectif"
                    type="text"
                    name="titre"
                value={Contact.titre}
                onChange={handleChange}
                />
                <button className='btn btn-primary col-12 mt-3' type="submit">Envoyer la demande à votre CS</button>
            </form>
        </div>
      </>
  )
}

export default DemandeContact