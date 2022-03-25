
import './App.css';
import Connection from './Components/Connection/Connection';
import ExpertsListe from './Components/Experts/ExpertsListe';
import ExpertCreation from './Components/Experts/ExpertCreation';
import ClientsListe from './Components/Clients/ClientsListe';
import {BrowserRouter as Router, Route, Routes} from 'react-router-dom'
import AccueilCustomerSuccess from './Components/CustomersSuccess/AccueilCustomerSuccess';
import AccueilExperts from './Components/Experts/AccueilExperts';
import ClientCreation from './Components/Clients/ClientCreation';
import CheminCreation from './Components/Chemins/Formulaires/CheminCreation';
import Mailer from './Components/Mailer/Mailer';
import CheminsInactifs from './Components/Listes/CheminsInactifs';
import CheminFormulaire from './Components/Chemins/Formulaires/CheminFormulaire';
import AccueilClient from './Components/Clients/AccueilClient';
import ClientProfil from "./Components/Clients/ClientProfil";
import ExpertsProfil from './Components/Experts/ExpertsProfil';
import ExpertDisponibilités from './Components/Experts/ExpertDisponibilites';



function App() {
  return (
    <div className="App">
      <Router>
        <Routes>
          <Route 
            path="/" element={<Connection />}
          />
           {/*============== Section EXPERTS ==========================*/}
          <Route 
            path="/experts" element={<AccueilExperts/>}
          />
          <Route 
            path="/experts-profil/:id" element={<ExpertsProfil/>}
          />
          <Route 
            path="/experts-planning/:id" element={<ExpertDisponibilités/>}
          />
          <Route 
            path="/expert/creation/" element={<ExpertCreation/>}
          />
          <Route 
            path="/experts/liste/" element={<ExpertsListe/>}
          />
           {/*============== Section CHEMINS ==========================*/}
           <Route 
            path="/chemin/creation/" element={<CheminCreation/>}
          />
           <Route 
            path="/cheminsinactifs/" element={<CheminsInactifs/>}
          />
            {/*============== Section CLIENTS ==========================*/}
            <Route 
            path="/clients" element={<AccueilClient/>}
          />
          <Route 
            path="/client-profil/:id" element={<ClientProfil/>}
          />
            <Route 
            path="/clients/liste/" element={<ClientsListe/>}
          />
          <Route 
            path="/client/creation/" element={<ClientCreation/>}
          />
          {/*============== Section CUSTOMER SUCCESS ================*/}

          <Route 
            path="/cs" element={<AccueilCustomerSuccess/>}
          />
          <Route 
            path="/cs-profil/:id" element={<AccueilCustomerSuccess/>}
          />
          <Route 
            path="/chemin/:id" element={<CheminFormulaire/>}
          />
           <Route 
            path="/mailer/" element={<Mailer/>}
          />
           
        </Routes> 
      </Router>
    </div>
  );
}

export default App;
