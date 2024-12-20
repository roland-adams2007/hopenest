document.addEventListener("DOMContentLoaded", function () {
    document.body.classList.add("loading");
    setTimeout(() => {
        document.body.classList.remove("loading");
    }, 2000); // Adjust the timeout as needed
});


const openMenu = document.querySelector('#openMenu');
const miniNav = document.querySelector('#miniNav');

openMenu.addEventListener('click', () => {
    miniNav.classList.toggle('hidden');
});