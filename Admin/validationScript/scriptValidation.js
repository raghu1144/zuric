const form = document.getElementById('form');
const EmpId = document.getElementById('EmpID');
const title = document.getElementById('Title');
const FirstName = document.getElementById('FirstName');
const LastName = document.getElementById('LastName');
const dob = document.getElementById('dob');
const gender = document.getElementById('gender');
const department = document.getElementById('department');
const joiningDate = document.getElementById('joiningDate');
const mobile = document.getElementById('mobile');
const emergencymob = document.getElementById('emergencymob');
const email = document.getElementById('email');
const Visa = document.getElementById('visa');
const photograph = document.getElementById('photograph');
const country = document.getElementById('country');
const region = document.getElementById('region');
const city = document.getElementById('city');
const Cur_address = document.getElementById('Cur_address');

const Perma_Addre = document.getElementById('Perma_Addre');

//Show input error messages
function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = 'forminput error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}

//show success colour
function showSucces(input) {
    const formControl = input.parentElement;
    formControl.className = 'forminput success';
}

//check email is valid
function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())) {
        showSucces(input)
    }else {
        showError(input,'Email is not invalid');
    }
}

//checkRequired fields
function checkRequired(inputArr) {
    inputArr.forEach(function(input){
        if(input.value.trim() === ''){
            showError(input,`${getFieldName(input)} is required`)
        }else {
            showSucces(input);
        }
    });
}

//check input Length
function checkLength(input, min ,max) {
    if(input.value.length < min) {
        showError(input, `${getFieldName(input)} must be at least ${min} characters`);
    }else if(input.value.length > max) {
        showError(input, `${getFieldName(input)} must be les than ${max} characters`);
    }else {
        showSucces(input);
    }
}

//get FieldName
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

//Event Listeners
form.addEventListener('submit',function(e) {
    e.preventDefault();

    checkRequired([email]);
    // checkLength(username,3,15);
    // checkLength(password,6,25);
    checkEmail(email);
    
});

