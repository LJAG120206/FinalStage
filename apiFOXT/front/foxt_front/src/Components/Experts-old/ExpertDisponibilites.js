import React from 'react'
import Calendrier from '../Calendrier/Calendrier'
import NavExperts from './NavExperts'

function ExpertDisponibilités() {
  return (
      <>
        <NavExperts id={localStorage.id} />
        <br />
        <h3>Déclarez vos prochaines disponibilités:</h3>
        <Calendrier />

      </>
  )
}

export default ExpertDisponibilités