// ABRIR FECHAR MENU
const toggle = document.getElementById('toggle-icon');
const overlay = document.getElementById('overlay');
const nav = document.getElementsByTagName('nav')[0]; // CONTAINER NAV
const body = document.getElementsByTagName('body')[0]; // BODY TAG 

toggle.addEventListener('click', openMenu);
toggle.addEventListener('touchstart', openMenu, { passive: false });

window.addEventListener('click', closeIfClickOutSide);

function openMenu(event) {
  if (event.type === 'touchstart') event.preventDefault();
  event.currentTarget.setAttribute('aria-expanded', 'true');
  event.currentTarget.setAttribute('aria-label', 'Fechar menu');

  if (nav.classList.contains('active')) {
    closemenu();
  }
  else {
    body.style.overflow = 'hidden';
    overlay.style.visibility = 'visible';
    nav.classList.add('active');
  }
}

function closemenu() {
  toggle.setAttribute('aria-expanded', 'false');
  toggle.setAttribute('aria-label', 'Abrir Menu');
  overlay.style.visibility = 'hidden';
  body.style.overflow = 'visible';
  nav.classList.remove('active');
}

function closeIfClickOutSide(event) {
  !nav.contains(event.target) && nav.classList.contains('active') && closemenu();
}

// ITEMS AÇÕES:

const navChilds = document.querySelectorAll('.nav-list li a');

navChilds.forEach( child => {
  child.addEventListener('click', function (e) {
    console.log(child.innerHTML);
  })
});

