import React,{useState} from 'react';
import'./FieldInput.css'


const FieldInput = ({className, name, label, value, onChange, placeholder, type="text", error=""}) => {


    return (
        <div className={className} >
        <label  htmlFor={name}>{label}</label>
        <input 
        value={value} 
        onChange={onChange}
        type={type} 
        placeholder={placeholder} 
        name={name}
        id={name}
        className={"form-control"+ (error && "is-invalid")}
       />
        {error && <p className='invalid-feedback'>{error}</p>}
    </div>
    );
}

export default FieldInput;
