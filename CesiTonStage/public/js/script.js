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




function showPopup(surname, lastname) {
    document.getElementById('successMessage').innerText = `Le compte de ${surname} ${lastname} est supprimé avec succès !`;
    document.getElementById('successPopup').classList.remove('hidden');
}

function closePopup() {
    document.getElementById('successPopup').classList.add('hidden');
}