//app.blade.php
function changeColor() {
    const div = document.getElementById('shimmerDiv');
    const colors = ['#f9a825', '#ffcc00', '#ff9900', '#ff6600'];
    let index = 0;

    setInterval(() => {
        div.style.backgroundColor = colors[index];
        index = (index + 1) % colors.length;
    }, 50000); // En milliseconds
}

changeColor();

function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
}

document.querySelector('.menu-toggle').addEventListener('click', toggleMenu);


document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item');
    const currentPath = window.location.pathname;

    menuItems.forEach(item => {
        const href = item.getAttribute('href');
        const routePath = new URL(href, window.location.origin).pathname;

        if (routePath === currentPath) {
            item.classList.remove('text-white');
            item.classList.add('text-yellow-500');
        } else {
            item.classList.remove('text-yellow-500');
            item.classList.add('text-white');
        }
    });
});


function showPopup(surname, lastname) {
    document.getElementById('successMessage').innerText = `Le compte de ${surname} ${lastname} est supprimé avec succès !`;
    document.getElementById('successPopup').classList.remove('hidden');
}

function closePopup() {
    document.getElementById('successPopup').classList.add('hidden');
}
