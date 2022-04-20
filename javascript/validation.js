const fnameElement = document.querySelector('#firstname');
const lnameElement = document.querySelector('#lastname');
const usernameElement = document.querySelector('#username');
const phoneElement = document.querySelector('#phone');
const passwordElement = document.querySelector('#password');
const emailElement = document.querySelector('#email');
//const streetElement = document.querySelector('#street');
const townElement = document.queryElement('#town');

const signup = document.querySelector('#signup');

signup.addEventListener('submit', (e) => {
    e.preventDefault(); /** Prevents the form from submitting. */

});

/** Returns true if the input argument is empty. */
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
    const formField = input.parentElement;
    formField.classList.remove('success');
    formField.classList.add('error');

    const error = formField.querySelector('small');
    error.textContent = message;

    /**
     * We're probably going to change the binding 'formField' to 'textField' 
     * since the div parent element is of class 'txt_field' on my html files.
     */
}

/**
 * Shows the success indicator.
 */
const showSuccess = (input) => {
    const formField = input.parentElement;
    formField.classList.remove('error');
    formField.classList.add('success');

    const error = formField.querySelector('small')
    error.textContent = '';
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
        showError(emailElement, 'Username cannot be blank.');
    } else if(!validEmail(email)){
        showError(emailElement, 'Email is not valid.');
    }else {
        showSuccess(emailElement)
        valid = true;
    }

    return valid;
}

/**
 * Validate password field.
 */

