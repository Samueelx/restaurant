'use strict';

const fnameElement = document.querySelector('#firstname');
const lnameElement = document.querySelector('#lastname');
const usernameElement = document.querySelector('#username');
const phoneElement = document.querySelector('#phone');
const passwordElement = document.querySelector('#password');
const emailElement = document.querySelector('#email');
const townElement = document.querySelector('#town');

const signup = document.querySelector('#signup');

signup.addEventListener('submit', (e) => {
    e.preventDefault(); /** Prevents the form from submitting. */

    let isUsernameValid = checkUsername(), isEmailValid = checkEmail(), 
    isPasswordValid = checkPassword(), isFirstnameValid = checkFname(), 
    isLastnameValid = checkLname();

    let validForm = isUsernameValid && isEmailValid && isPasswordValid && isFirstnameValid && 
    isLastnameValid;

});

/** Returns false if the input argument is empty. */
const isRequired = value => value === '' ? false : true;

const isBetween = (length, min, max) => length < min || length > max ? false : true;

/**
 * A function to check whether the email is valid. We use regular expressions here: 
 */
const validEmail = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

const passwordCheck = (password) => {
    const rep = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})");
    return rep.test(password);
}

/**
 * Highlights the border of the input field and displays an error message
 */
const showError = (input, message) => {
    const textField = input.parentElement;
    textField.classList.remove('success');
    textField.classList.add('error');

    const error = textField.querySelector('small');
    error.textContent = message;
}

/**
 * Shows the success indicator.
 */
const showSuccess = (input) => {
    const textField = input.parentElement;
    textField.classList.remove('error');
    textField.classList.add('success');

    const error = textField.querySelector('small')
    error.textContent = '';
}

/**
 * Validate first name.
 */
const checkFname = () => {
    let valid = false;
    const firstName = fnameElement.value.trim();
    if(!isRequired(firstName)){
        showError(fnameElement, 'First name cannot be blank');
    } else {
        showSuccess(fnameElement);
        valid = true;
    }
    return valid;
}

/**
 * Validate last name
 */
const checkLname = () => {
    let valid = false;
    const lastName = lnameElement.value.trim();
    if(!isRequired(lastName)){
        showError(lnameElement, 'Last name cannot be blank.');
    } else {
        showSuccess(lnameElement);
        valid = true;
    }
    return valid;
}

/**
 * validate username field.
 */
const checkUsername = () => {
    let valid = false;
    const min = 3;
    const max = 25;
    const username = usernameElement.value.trim();

    if(!isRequired(username)){
        showError(usernameElement, `Username cannot be blank.`);
    } else if(!isBetween(username.length, min, max)){
        showError(usernameElement, `Username must be between ${min} and ${max} characters.`);
    } else {
        showSuccess(usernameElement);
        valid = true;
    }

    return valid;
}

/**
 * Validate the email field.
 */
const checkEmail = () => {
    let valid = false;
    const email = emailElement.value.trim();

    if(!isRequired(email)){
        showError(emailElement, 'Email cannot be blank.');
    } else if(!validEmail(email)){
        showError(emailElement, 'Email is not valid.');
    }else {
        showSuccess(emailElement);
        valid = true;
    }

    return valid;
}

/**
 * Validate password field.
 */
const checkPassword = () => {
    let valid = false;
    const password = passwordElement.value.trim();

    if(!isRequired(password)){
        showError(passwordElement, 'Password cannot be blank.');
    } else if(!passwordCheck(password)){
        showError(passwordElement, 'Password must contain atleast 8 characters that include atleast 1 lowercase character, 1 uppercase character, 1 number and 1 special character.');
    } else {
        showSuccess(passwordElement);
        valid = true;
    }

    return valid;
}