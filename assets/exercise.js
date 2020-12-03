

  /* ----------------------------
  
    CustomValidation prototype
  
    - Keeps track of the list of invalidity messages for this input
    - Keeps track of what validity checks need to be performed for this input
    - Performs the validity checks and sends feedback to the front end
  	
  ---------------------------- */

  function CustomValidation() {
    this.invalidities = [];
    this.validityChecks = [];
  }

CustomValidation.prototype = {
  addInvalidity: function (message) {
    this.invalidities.push(message);
  },
  getInvalidities: function () {
    return this.invalidities.join('. \n');
  },
  checkValidity: function (input) {
    for (var i = 0; i < this.validityChecks.length; i++) {

      var isInvalid = this.validityChecks[i].isInvalid(input);
      if (isInvalid) {
        this.addInvalidity(this.validityChecks[i].invalidityMessage);
      }

      var requirementElement = this.validityChecks[i].element;
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
};



/* ----------------------------

  Validity Checks

  The arrays of validity checks for each input
  Comprised of three things
    1. isInvalid() - the function to determine if the input fulfills a particular requirement
    2. invalidityMessage - the error message to display if the field is invalid
    3. element - The element that states the requirement
	
---------------------------- */

var usernameValidityChecks = [
  {
    isInvalid: function (input) {
      return input.value.length < 3;
    },
    invalidityMessage: 'This input needs to be at least 3 characters',
    element: document.querySelector('label[for="username"] .input-requirements li:nth-child(1)')
  },
  {
    isInvalid: function (input) {
      var illegalCharacters = input.value.match(/[^a-zA-Z0-9]/g);
      return illegalCharacters ? true : false;
    },
    invalidityMessage: 'Only letters and numbers are allowed',
    element: document.querySelector('label[for="username"] .input-requirements li:nth-child(2)')
  }
];

// Mine code here
var emailValidityChecks = [
  {
    isInvalid: function (input) {
      return input.value.length < 3;
    },
    invalidityMessage: 'This input needs to be at least 3 characters',
    element: document.querySelector('label[for="username"] .input-requirements li:nth-child(1)')
  }
]
/*  Mine code end here */


var passwordValidityChecks = [
  {
    isInvalid: function (input) {
      return input.value.length < 8 | input.value.length > 100;
    },
    invalidityMessage: 'This input needs to be between 8 and 100 characters',
    element: document.querySelector('label[for="password"] .input-requirements li:nth-child(1)')
  },
  {
    isInvalid: function (input) {
      return !input.value.match(/[0-9]/g);
    },
    invalidityMessage: 'At least 1 number is required',
    element: document.querySelector('label[for="password"] .input-requirements li:nth-child(2)')
  },
  {
    isInvalid: function (input) {
      return !input.value.match(/[a-z]/g);
    },
    invalidityMessage: 'At least 1 lowercase letter is required',
    element: document.querySelector('label[for="password"] .input-requirements li:nth-child(3)')
  },
  {
    isInvalid: function (input) {
      return !input.value.match(/[A-Z]/g);
    },
    invalidityMessage: 'At least 1 uppercase letter is required',
    element: document.querySelector('label[for="password"] .input-requirements li:nth-child(4)')
  },
  {
    isInvalid: function (input) {
      return !input.value.match(/[\!\@\#\$\%\^\&\*]/g);
    },
    invalidityMessage: 'You need one of the required special characters',
    element: document.querySelector('label[for="password"] .input-requirements li:nth-child(5)')
  }
];

var passwordRepeatValidityChecks = [
  {
    isInvalid: function () {
      return passwordRepeatInput.value != passwordInput.value;
    },
    invalidityMessage: 'This password needs to match the first one'
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
    var message = input.CustomValidation.getInvalidities();
    input.setCustomValidity(message);
  }
}



/* ----------------------------

  Setup CustomValidation

  Setup the CustomValidation prototype for each input
  Also sets which array of validity checks to use for that input

---------------------------- */

var usernameInput = document.getElementById('username');
var passwordInput = document.getElementById('password');
var passwordRepeatInput = document.getElementById('password_repeat');

usernameInput.CustomValidation = new CustomValidation();
usernameInput.CustomValidation.validityChecks = usernameValidityChecks;

passwordInput.CustomValidation = new CustomValidation();
passwordInput.CustomValidation.validityChecks = passwordValidityChecks;

passwordRepeatInput.CustomValidation = new CustomValidation();
passwordRepeatInput.CustomValidation.validityChecks = passwordRepeatValidityChecks;




/* ----------------------------

  Event Listeners

---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');
var submit = document.querySelector('input[type="submit"');

for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('keyup', function () {
    checkInput(this);
  });
}

submit.addEventListener('click', function () {
  for (var i = 0; i < inputs.length; i++) {
    checkInput(inputs[i]);
  }
});


/* first attempt for form validation */
contact_name.addEventListener('input', (e) => {
  if (nameValue === '') {
    // show error
    // add error class
    setErrorFor(contact_name, 'Name cannot be blank');
  } else {
    // add success class
    setSuccessFor(contact_name);
  }

});


// EMAIL
contact_email.addEventListener('input', (e) => {
  if (emailValue === '') {
    // show error
    // add error class
    setErrorFor(contact_email, 'Email cannot be blank');
  } else if (!isEmail(emailValue)) {
    setErrorFor(contact_email, 'Email is not Valid');
  } else {
    // add success class
    setSuccessFor(contact_email);
  }
});



// MESSAGE
contact_message.addEventListener('input', (e) => {
  if (messageValue === '') {
    // show error
    // add error class
    setErrorFor(contact_message, 'Message cannot be blank');
  } else {
    // add success class
    setSuccessFor(contact_message);
  }
});

/*  } */


function setErrorFor(input, message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector('small');

  //add error message
  small.innerText = message;

  //add Erro Class
  formControl.className = 'cnt-form__inputs error';
}

function setSuccessFor(input) {
  const formControl = input.parentElement;
  formControl.className = 'cnt-form__inputs success';
}


function isEmail(email) {
  var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;

  return re.test(email.toLowerCase());
}


myForm.addEventListener('submit', myContactFormListeners, false);
 /*  myForm.addEventListener( 'input', myContactFormListeners, false ); */




/* async function submitContactForm() {
  const response = await fetch( jsforwp_globals.ajax_url, {
    method: 'post',
    body: data
  })
}

submitContactForm()

  .catch( error => {
    console.log('error!');
    console.log(error)
  }); */



/* toLowerCase() */

/* 'new FormData(myForm) */ /*  _ajax_nonce: jsforwp_globals.photolensor_save_user_contact_form */

/*  fetch(ajax_url, {
  method: 'POST',
  credentials: 'same-origin',
  headers: new Headers({'Content-Type': 'application/x-www-form-urlencoded'}),
  body: 'action=zget_profile_user'
}) */
/*
new URLSearchParams(new FormData(myForm), {
  action: 'photolensor_save_user_contact_form',
  _ajax_nonce: jsforwp_globals.photolensor_save_user_contact_form */

  function ValidateEmail(inputText) {
  var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (inputText.value.match(mailformat)) {
    alert("You have entered a valid email address!");    // The pop up alert for a valid email address
    document.form1.text1.focus();
    return true;
  }
  else {
    alert("You have entered an invalid email address!");    // The pop up alert for an invalid email address
    document.form1.text1.focus();
    return false;
  }
} 