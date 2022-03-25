import React, { useEffect, useState } from "react";
import NavCustomerSuccess from "./NavCustomerSuccess";
import CheminsInactifs from "../Chemins/Listes/CheminsInactifs";

const AccueilCustomerSuccess = (props) => {
  return (
    <>
      <NavCustomerSuccess id={localStorage.id} />
        <p>Boujour {localStorage.prenom} {localStorage.nom} !</p>
        <CheminsInactifs />
        
    </>
  );
};

export default AccueilCustomerSuccess;
