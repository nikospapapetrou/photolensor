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
  if (!wasOpen && event.target.matches(".mb-menu a") && body.clientWidth <= 630) {
    event.target.nextElementSibling.classList.toggle("open");
  }
  /*  console.log(event.target); */
});


// Submit Form

myForm.addEventListener('submit', (e) => {

  e.preventDefault();
  console.log('form has submitted');


  let request = new XMLHttpRequest();
  request.open('post', 'ajaxurl', true);
  console.log(request);

  request.send(new FormData(myForm));
  console.log(request);

});