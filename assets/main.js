const body = document.querySelector('body');
const mb_header = document.querySelector('.mb-header');
const logo = document.querySelector('.logo-link');
const header = document.querySelector('.main-header');
const main_nav = document.querySelector('.main-nav');
const list = document.querySelectorAll('.mb-menu__items');
const mainNavList = document.querySelector('.main-nav__list');
const mobile_menu_container = document.querySelector('.mb-menu__container');
const mb_menu = document.querySelector('.mb-menu');
const dropup = document.querySelectorAll('.dropup');
const search_container = document.querySelector('.search-container');
const search_wrapper = document.querySelector('.search-wrapper');
const search_form = document.querySelector('.search-form');

// CONTACT FORM VARIABLES
const myForm = document.querySelector('#cnt-form');


/* -- watch for width changing -- */
document.addEventListener('DOMContentLoaded', () => {
  let result = new ResizeObserver(move);
  result.observe(body);
});

/* move elements*/
function move() {
  for (let ls of list)
    if (body.clientWidth >= 630) {
      header.insertAdjacentElement('afterbegin', logo) &&
        mainNavList.insertAdjacentElement('beforeend', ls) &&
        header.insertAdjacentElement('beforeend', search_form);
    } else {
      mb_header.insertAdjacentElement('afterbegin', logo) &&
        mobile_menu_container.insertAdjacentElement('afterbegin', ls) &&
        search_wrapper.insertAdjacentElement('afterbegin', search_form);
    }
};

/*  stop from closing the form when click inside */
search_form.addEventListener('click', (e) => {
  e.stopPropagation();
});


document.addEventListener("click", event => {
  // first check if it was already open
  let wasOpen = event.target.matches(".mb-menu a") &&
    event.target.nextElementSibling.classList.contains("open");
  // next close every dropdown
  for (let dd of dropup) dd.classList.toggle("open", false);
  // then if a link was clicked, open the associated dropdown, BUT only if not open before
  if (!wasOpen && event.target.matches(".mb-menu a") && body.clientWidth <= 640) {
    event.target.nextElementSibling.classList.toggle("open");
  }
  /*  console.log(event.target); */
});


// Submit Form
myForm.addEventListener('submit', (e) => {

  e.preventDefault();
  CustomValidation();

  const data = new FormData(myForm);
  data.append('action', 'photolensor_save_user_contact_form');

  fetch(jsforwp_globals.ajax_url, {
    method: 'post',
    body: data

  }).then(function (response) {
    return response.text();
  }).then(function (text) {
    console.log(text);
  });

}); // End submit form



/* const contact_name = document.querySelector('#contact-name');
const contact_email = document.querySelector('#contact-email');
const contact_message = document.querySelector('#contact-message');
const nameValue = contact_name.value.trim();
const emailValue = contact_email.value.toLowerCase();
emailValue = emailValue.trim();
const messageValue = contact_message.value.trim();
 */

function CustomValidation() {
  this.invalidities = [];
  this.validityChecks = [];
}

CustomValidation.prototype = {
  addInvalidity: function(message) {
    this.invalidities.push(message);
  },
  getInvalidities: function() {
    return this.invalidities.join('. \n');
  },
  checkValidity: function(input) {
    for (let i = 0; i < this.validityChecks.length; i++) {

      let isInvalid = this.validityChecks[i].isInvalid(input);
      if (isInvalid) {
        this.addInvalidity(this.validityChecks[i].invalidityMessage);
      }

      let requirementElement = this.validityChecks[i].element;
      if (requirementElement) {
        if (isInvalid) {
          requirementElement.classList.add('invalid');
          requirementElement.classList.remove('valid');
        } else {
          requirementElement.classList.remove('invalid');
          requirementElement.classList.add('valid');
        }

      } // end if requirementElement
    } // end for
  }
};  // End of Prototype




/* ----------------------------

  Validity Checks

  The arrays of validity checks for each input
  Comprised of three things
    1. isInvalid() - the function to determine if the input fulfills a particular requirement
    2. invalidityMessage - the error message to display if the field is invalid
    3. element - The element that states the requirement
	
---------------------------- */

const usernameValidityChecks = [
  {
    isInvalid: function(input) {
      return input.value.length < 3;
    }, 
    invalidityMessage: 'This input needs to be at least 3 characters',
    element: document.querySelector('.cnt-form label[for="name"] .input-requirements li:nth-child(1)')
  },
  {
    isInvalid: function(input) {
      let illegalCharacters = input.value.match(/[^a-zA-Z0-9]/g);
      return illegalCharacters ? true : false;
    },
    invalidityMessage: 'Only letters and numbers are allowed',
    element: document.querySelector('.cnt-form label[for="name"] .input-requirements li:nth-child(2)')
  }
];

const emailValidityChecks = [
  {
    isInvalid: function(input) {
      return input.value.length < 8;
    }, 
    invalidityMessage: 'This input needs to be at least 3 characters',
    element: document.querySelector('.cnt-form label[for="email"] .input-requirements li:nth-child(1)')
  },
  {
    isInvalid: function(input) {
    let mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    return !input.value.match(mailformat);
   /*  if(input.value.match(mailformat)) return mailformat ? true : false; */ /* {console.log('You have entered valid email')} else {console.log('wrong email')} */
      
    },
    invalidityMessage: 'Only letters and numbers are allowed',
    element: document.querySelector('.cnt-form label[for="email"] .input-requirements li:nth-child(2)')
  }
];



/* ----------------------------

  Check this input

  Function to check this particular input
  If input is invalid, use setCustomValidity() to pass a message to be displayed

---------------------------- */

function checkInput(input) {

  input.CustomValidation.invalidities = [];
  input.CustomValidation.checkValidity(input);

  if (input.CustomValidation.invalidities.length == 0 && input.value != '') {
    input.setCustomValidity('');
  } else {
    let message = input.CustomValidation.getInvalidities();
    input.setCustomValidity(message);
  }
}

/* ----------------------------

  Setup CustomValidation

  Setup the CustomValidation prototype for each input
  Also sets which array of validity checks to use for that input

---------------------------- */

let usernameInput = document.getElementById('contact-name');
let emailInput = document.getElementById('contact-email');
/* var passwordRepeatInput = document.getElementById('contact-message'); */

usernameInput.CustomValidation = new CustomValidation();
usernameInput.CustomValidation.validityChecks = usernameValidityChecks;

emailInput.CustomValidation = new CustomValidation();
emailInput.CustomValidation.validityChecks = emailValidityChecks;




/* ----------------------------

  Event Listeners

---------------------------- */

let inputs = document.querySelectorAll('#cnt-form input:not([type="submit"])');
let submit = document.querySelector('#cnt-form input[type="submit"');



for (let i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('click', function () {
    checkInput(this);
  });
}

submit.addEventListener('keyup', function () {
  for (let i = 0; i < inputs.length; i++) {
    checkInput(inputs[i]);
  }
});


// Setup our function to run on various events
var someFunction = function (event) {
  // Do something...
};

function someFunction(event) {

}

// Add our event listeners
window.addEventListener('click', someFunction, false);
window.addEventListener('mouseover', someFunction, false);
myForm.addEventListener('submit', myContactFormListeners, false);

function addMultipleEventListener(element, events, handler) {
  events.forEach(e => element.addEventListener(e, handler))
}