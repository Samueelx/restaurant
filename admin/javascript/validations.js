'use strict';

const usernameElement = document.querySelector('#username');
const fnameElement = document.querySelector('#firstname');
const lnameElement = document.querySelector('#lastname');
const emailElement = document.querySelector('#email');
const passwordElement = document.querySelector('#password');
const phoneElement = document.querySelector('#phone');

const form = document.querySelector('#signup');

form.addEventListener('submit', (e) => {

    let isUsernameValid = checkUsername(), isFirstnameValid = checkFname(),
        isLastnameValid = checkLname(), isEmailValid = checkEmail(), isPasswordValid = checkPassword(), isPhoneValid = checkPhone();

    let validForm = isUsernameValid && isFirstnameValid && isLastnameValid && isEmailValid && isPasswordValid && isPhoneValid;

    if (validForm === false) {
        /**Cancels the submit event preventing the form from submitting */
        e.preventDefault();
    }
});

const isRequired = (value) => value === '' ? false : true;

const isBetween = (length, min, max) => length < min || length > max ? false : true;

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})");
    return re.test(password);
}

const showError = (input, message) => {
    const messageField = input.nextElementSibling;
    messageField.classList.add('error');
    /**show the error message */
    const error = messageField.querySelector('small');
    error.textContent = message;
}
const showSuccess = (input) => {
    const messageField = input.nextElementSibling;
    /**Hide the error message */
    const error = messageField.querySelector('small');
    error.textContent = '';
}

/**The validating Functions */
const checkFname = () => {
    let valid = false;
    const firstName = fnameElement.value.trim();
    if (!isRequired(firstName)) {
        showError(fnameElement, 'First name cannot be blank');
    } else {
        showSuccess(fnameElement);
        valid = true;
    }
    return valid;
}

const checkLname = () => {
    let valid = false;
    const lastName = lnameElement.value.trim();
    if (!isRequired(lastName)) {
        showError(lnameElement, 'Last name cannot be blank.');
    } else {
        showSuccess(lnameElement);
        valid = true;
    }
    return valid;
}

const checkUsername = () => {
    let valid = false;
    const min = 3, max = 25;
    const username = usernameElement.value.trim();

    if (!isRequired(username)) {
        showError(usernameElement, 'Username cannot be blank!');
    } else if (!isBetween(username.length, min, max)) {
        showError(usernameElement, `username must be between ${min} and ${max} charachers.`);
    } else {
        showSuccess(usernameElement);
        valid = true;
    }
    return valid;
}

const checkEmail = () => {
    let valid = false;
    const email = emailElement.value.trim();
    if (!isRequired(email)) {
        showError(emailElement, 'Email cannot be empty!');
    } else {
        showSuccess(emailElement);
        valid = true;
    }

    return valid;
}

const checkPassword = () => {
    let valid = false;
    const password = passwordElement.value.trim();

    if (!isRequired(password)) {
        showError(passwordElement, 'Password field cannot be empty');
    } else if (!isPasswordSecure(password)) {
        showError(passwordElement, 'Password must contain atleast 8 characters that include atleast 1 lowercase character, 1 uppercase character, 1 number and 1 special character.');
    } else {
        showSuccess(passwordElement);
        valid = true;
    }
    return valid;
}

const checkPhone = () => {
    let valid = false;
    const min = 10, max = 10;
    const phone = phoneElement.value.trim();
    const phoneNumber = parseInt(phone);

    if (!isRequired(phoneNumber)) {
        showError(phoneElement, 'Phone field cannot be blank!');
    } else if(Number.isNaN(phoneNumber)){
        showError(phoneElement, 'Input must be integers');
    } else if (!isBetween(phoneNumber.length, min, max)) {
        showError(phoneElement, `phone number must be ${min} characters.`);
    } else {
        showSuccess(phoneElement);
        valid = true;
    }
    return valid;
}