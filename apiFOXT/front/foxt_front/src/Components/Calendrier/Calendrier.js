import React from 'react'
import FullCalendar, { formatDate } from '@fullcalendar/react'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'

export default class Calendrier extends React.Component {

  state = {
    weekendsVisible: false,
    currentEvents: []
  }

  eventGuid = 0

  INITIAL_EVENTS = [] // utile pour interface clients

  createEventId() {
    return String(this.eventGuid++)
  }
  
  handleWeekendsToggle = () => {
    this.setState({
      weekendsVisible: !this.state.weekendsVisible
    })
  }

  handleDateSelect = (selectInfo) => {
    let title = "Disponible"
    let calendarApi = selectInfo.view.calendar

    calendarApi.unselect() 

    calendarApi.addEvent({
    id: this.createEventId(),
    title,
    start: selectInfo.startStr,
    end: selectInfo.endStr,
    allDay: selectInfo.allDay
    })
    
  }

  handleEventClick = (clickInfo) => {
    clickInfo.event.remove()
  }

  handleEvents = (events) => {
    this.setState({
      currentEvents: events
    })
  }

  
  renderEventContent = (eventInfo) => {
    return (
      <>
        <b>{eventInfo.timeText}</b>
        <i>{eventInfo.event.title}</i>
      </>
    )
  }

  ValidateMyDispo = () =>{
    //ici, on recupere les données des éléments du calendrier sélectionnés. Il faudra faire une requête http pour enregistrer ces données dans la BDD. 
    console.log(this.state.currentEvents);
    //console.log(this.state.currentEvents[0].startStr);
  }

  render() {
    return (
      <div className='calendrier'>
        <div className='calendrier-main'>
            <hr />
          <div className="d-grid gap-2 d-md-flex justify-content-md-end">
            <button className='btn btn-secondary btn-sm' onClick={this.handleWeekendsToggle}>{this.state.weekendsVisible ? "Masquer" : "Afficher"} les week-end</button>
            <button className='btn btn-success' onClick={this.ValidateMyDispo}>Valider mes disponibilités</button>
          </div>
          <hr />
          <br />
          <FullCalendar
            plugins={[dayGridPlugin, timeGridPlugin, interactionPlugin]}
            headerToolbar={{
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'
            }}
            height = {560}
            initialView='timeGridWeek'
            allDaySlot = {false}
            editable={true}
            selectable={true}
            selectMirror={true}
            dayMaxEvents={true}
            weekends={this.state.weekendsVisible}
            initialEvents={this.INITIAL_EVENTS} // pour tester des rdv de base (utile sur interface clients)
            select={this.handleDateSelect}
            eventContent={this.renderEventContent}
            eventClick={this.handleEventClick}
            eventsSet={this.handleEvents}
          />
        </div>
      </div>
    )
  }

}

