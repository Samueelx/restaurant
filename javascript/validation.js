const fnameElement = document.querySelector('#firstname');
const lnameElement = document.querySelector('#lastname');
const usernameElement = document.querySelector('#username');
const phoneElement = document.querySelector('#phone');
const passwordElement = document.querySelector('#password');
const streetElement = document.querySelector('#street');
const townElement = document.queryElement('#town');

const signup = document.querySelector('#signup');

signup.addEventListener('submit', (e) => {
    e.preventDefault(); /** Prevents the form from submitting. */

});

/** Returns true if the input argument is empty. */
const isRequired = value => value === '' ? false : true;

const isBetween = (length, min, max) => length < min || lenth > max ? false : true;

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