document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.getElementById('hamburger');
    const menu = document.getElementById('menu');

    // Toggle menu visibility
    hamburger.addEventListener('click', () => {
        menu.classList.toggle('open');
    });
});
