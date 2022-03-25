import React, { useState } from 'react';
import { v4 } from 'uuid';
import'./Select.css'

const Select = (props) => {
   
    return (
        <div className={props.className}>
            <label>{props.label}</label>
            <select 
            id={props.id} 
            key={v4()} 
            name={props.name}
            onChange={props.onChange} 
            value={props.value}
            >
                {
                props.options.map((choix) =>
                     <option key={v4()} value={choix[0]}>{choix[1]}</option>
                    )}
            
           </select>
        </div>
    );
 }

export default Select;
