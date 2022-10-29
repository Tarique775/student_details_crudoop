//ALL THE ELEMENT CATHING
let userName =document.getElementById('userName');
let university =document.getElementById('university');
let city =document.getElementById('city');
let contact=document.getElementById('contact');
let form =document.getElementById('form');
let errorMsg =document.getElementsByClassName('error');

//USERNAME FIELD VALIDATION CONDITION
const UserNameValdation=()=>{
    if(userName.value.trim() === ""){
        errorMsg[0].innerHTML="UserName Must be Provided";
        userName.style.border = "2px solid red";
        errorMsg[0].style.color="red";
    }else{
        if(userName.value.length > 15 || userName.value.length < 3){
            errorMsg[0].innerHTML="UserName should be grater than 3 and not more than 15";
            userName.style.border = "2px solid red";
            errorMsg[0].style.color="red";
        }
        if(!userName.value.match(/^[a-zA-Z ]*$/,'g')){
            errorMsg[0].innerHTML="UserName should be string";
            userName.style.border = "2px solid red";
            errorMsg[0].style.color="red";
        }
    }
}

//UNIVERSITY FIELD VALIDATION CONDITION
const uniValdation=()=>{
    if(university.value.trim() === ""){
        errorMsg[1].innerHTML="University Must be Provided";
        university.style.border = "2px solid red";
        errorMsg[1].style.color="red";
    }else{
        if(university.value.length > 15 || university.value.length < 3){
            errorMsg[1].innerHTML="University should be grater than 3 and not more than 15";
            university.style.border = "2px solid red";
            errorMsg[1].style.color="red";
        }
        if(!university.value.match(/^[a-zA-Z ]*$/,'g')){
            errorMsg[1].innerHTML="University should be string";
            university.style.border = "2px solid red";
            errorMsg[1].style.color="red";
        }
    }
}

//CITY FIELD VALIDATION CONDITION
const cityValdation=()=>{
    if(city.value.trim() === ""){
        errorMsg[2].innerHTML="City Must be Provided";
        city.style.border = "2px solid red";
        errorMsg[2].style.color="red";
    }else{
        if(city.value.length > 15 || city.value.length < 3){
            errorMsg[2].innerHTML="City should be grater than 3 and not more than 15";
            city.style.border = "2px solid red";
            errorMsg[2].style.color="red";
        }
        if(!city.value.match(/^[a-zA-Z ]*$/,'g')){
            errorMsg[2].innerHTML="City should be string";
            city.style.border = "2px solid red";
            errorMsg[2].style.color="red";
        }
    }
}

//CONATACT FIELD VALIDATION CONDITION
const contactValdation=()=>{
    if(contact.value.trim() === ""){
        errorMsg[3].innerHTML="Contact Must be Provided";
        contact.style.border = "2px solid red";
        errorMsg[3].style.color="red";
    }else{
        if(contact.value.length > 15 || contact.value.length < 3){
            errorMsg[3].innerHTML="Contact should be grater than 3 and not more than 15";
            contact.style.border = "2px solid red";
            errorMsg[3].style.color="red";
        }
        if(!contact.value.match(/^(\+)?([0-9]){10,16}$/,'g')){
            errorMsg[3].innerHTML="Contact should be string";
            contact.style.border = "2px solid red";
            errorMsg[3].style.color="red";
        }
    }
}
let log=false;
//TRHOW AN EVENT WHEN "FORM" RAISE
form.addEventListener("submit", (e) => {
    //CHECK USERVALIDATION METHOD
    if(!log){
        if(UserNameValdation()){
            e.preventDefault();
        }
        if(uniValdation()){
            e.preventDefault();
        }
        if(cityValdation()){
            e.preventDefault();
        }
        if(contactValdation()){
            e.preventDefault();
        }
        // uniValdation();
        // cityValdation();
        // contactValdation();
    }else{
        console.log("NOT SUBMIT");
    }
});