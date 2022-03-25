import React from 'react'
import DemandeContact from '../Chemins/Formulaires/DemandeContact';
import NavClient from './NavClient';

function AccueilClient() {
  return (
      <>
        <NavClient id={localStorage.id} />
        <p>Boujour {localStorage.prenom} {localStorage.nom} !</p>
        <DemandeContact />
      </>
  )
}

export default AccueilClient