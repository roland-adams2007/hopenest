const sidebarOpen = document.getElementById('sidebarOpen');
const sidebarClose = document.getElementById('sidebarClose');
const sidebar = document.querySelector('nav');

sidebarOpen.addEventListener('click', () => {
    sidebar.classList.remove('hidden');
});

sidebarClose.addEventListener('click', () => {
    sidebar.classList.add('hidden');
});