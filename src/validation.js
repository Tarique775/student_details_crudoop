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
        console.log(errorMsg);
        userName.style.border = "2px solid red";
        errorMsg[0].style.color="red";
    }else{
        if(userName.value.length > 15 || userName.value.length < 3){
            errorMsg[0].innerHTML="UserName should be grater than 3 and not more than 15";
            console.log(errorMsg);
            userName.style.border = "2px solid red";
            errorMsg[0].style.color="red";
        }
        // if(isNaN(userName.value)){
        //     errorMsg[0].innerHTML="UserName should be string";
        //     console.log(errorMsg);
        //     userName.style.border = "2px solid red";
        //     errorMsg[0].style.color="red";
        // }
    }
}

//UNIVERSITY FIELD VALIDATION CONDITION
const uniValdation=()=>{
    if(university.value.trim() === ""){
        errorMsg[1].innerHTML="University Must be Provided";
        console.log(errorMsg);
        university.style.border = "2px solid red";
        errorMsg[1].style.color="red";
    }else{
        if(university.value.length > 15 || university.value.length < 3){
            errorMsg[1].innerHTML="University should be grater than 3 and not more than 15";
            console.log(errorMsg);
            university.style.border = "2px solid red";
            errorMsg[1].style.color="red";
        }
    }
}

//CITY FIELD VALIDATION CONDITION
const cityValdation=()=>{
    if(city.value.trim() === ""){
        errorMsg[2].innerHTML="City Must be Provided";
        console.log(errorMsg);
        city.style.border = "2px solid red";
        errorMsg[2].style.color="red";
    }else{
        if(city.value.length > 15 || city.value.length < 3){
            errorMsg[2].innerHTML="City should be grater than 3 and not more than 15";
            console.log(errorMsg);
            city.style.border = "2px solid red";
            errorMsg[2].style.color="red";
        }
    }
}

//CONATACT FIELD VALIDATION CONDITION
const contactValdation=()=>{
    if(contact.value.trim() === ""){
        errorMsg[3].innerHTML="Contact Must be Provided";
        console.log(errorMsg);
        contact.style.border = "2px solid red";
        errorMsg[3].style.color="red";
    }else{
        if(contact.value.length > 15 || contact.value.length < 3){
            errorMsg[3].innerHTML="Contact should be grater than 3 and not more than 15";
            console.log(errorMsg);
            contact.style.border = "2px solid red";
            errorMsg[3].style.color="red";
        }
    }
}

//TRHOW AN EVENT WHEN "FORM" RAISE
form.addEventListener("submit", (e) => {
    e.preventDefault();
    //CHECK USERVALIDATION METHOD
    UserNameValdation();
    uniValdation();
    cityValdation();
    contactValdation();
});