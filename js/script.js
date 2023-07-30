const menuBtn = document.querySelector('.menu-btn');
menuBtn.onclick = function() {
    const navBar = document.querySelector('.slide');
    navBar.classList.toggle('show');
};
