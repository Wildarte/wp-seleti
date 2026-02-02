const btn_menu = document.querySelector('.btn_menu');
const nav_menu = document.querySelector('nav.menu');
const close_menu = document.querySelector('.close_menu');

btn_menu.addEventListener('click', () => {
    nav_menu.classList.add('open_nav_menu');
});

close_menu.addEventListener('click', () => {
    nav_menu.classList.remove('open_nav_menu');
})