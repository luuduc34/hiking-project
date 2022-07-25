const menuBurger = () => {
    var burger = document.querySelector('.burger');
    var nav = document.querySelector('#' + burger.dataset.target);

    burger.addEventListener('click', () => {
        burger.classList.toggle('is-active');
        nav.classList.toggle('is-active');
    });
};
menuBurger();