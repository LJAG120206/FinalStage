import React from 'react'
import { useState } from 'react'
import'./TextArea.css'

function TexteArea(props) {

    const [value, setValue] = useState(props.value);
    return (
        <div className={props.className}>
            <label>{props.label}</label>
            <textarea
            value={props.value}
            onChange={props.onChange}
            name={props.id} 
            id={props.id} 
            />
        </div>
    );
}

export default TexteArea
