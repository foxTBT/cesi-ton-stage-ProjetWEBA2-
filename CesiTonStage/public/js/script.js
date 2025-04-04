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

window.onload = function () {
    let acceptCookies = document.cookie.includes('accept_cookies=true');
    if (!acceptCookies) {
        document.getElementById("popup").style.display = "flex";
    }
}

function accept() {
    document.getElementById("popup").style.display = "none";

    fetch("{{ route('accept.cookies') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ accept: true })
    }).then(response => response.json()).then(data => {
        if (data.success) {
            document.cookie = "accept_cookies=true; path=/; max-age=" + (30 * 24 * 60 * 60);
        }
    });
}

function reject() {
    document.getElementById("popup").style.display = "none";

    fetch("{{ route('reject.cookies') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ accept: false })
    }).then(response => response.json()).then(data => {
        if (data.success) {
            document.cookie = "accept_cookies=false; path=/; max-age=" + (30 * 24 * 60 * 60);
            window.location.href = document.referrer || '/';
        }
    });
}


//script offers

//permet de montrer ou cacher la description d'une offre
function toggleDescription(button) {
    const description = button.parentElement.nextElementSibling;
    if (description.classList.contains('hidden')) {
        description.classList.remove('hidden');
        button.innerHTML = "<strong>Description-</strong>";
    } 
    else {
        description.classList.add('hidden');
        button.innerHTML = "<strong>Description+</strong>";
    }
}


//permet de postuler à une offre si on ne l'a pas encore fait
function hideButtonAfterApply(button) {
    // Empêche le comportement par défaut du lien 
    event.preventDefault();
        
    // Cache le bouton
    button.style.display = 'none';
        
    // Redirige après un délai de 0.5 seconde 
    setTimeout(function() {
        window.location.href = button.href; // Effectue la redirection vers la route de la création de la candidature
    }, 500);
}

//partial de l'évaluation
function afficherCellule_E() {
    document.getElementById("cellule_E").classList.remove("hidden");
}

function fermerCellule_E() {
    document.getElementById("cellule_E").classList.add("hidden");
}

window.onload = () => {
    const stars = document.querySelectorAll(".la-star");
    const noteInput = document.querySelector("#note");

    stars.forEach((star) => {
        // Effet au survol
        star.addEventListener("mouseover", function() {
            resetStars();
            this.style.color = "#eab308";
            this.classList.add("las");
            this.classList.remove("lar");

            let previousStar = this.previousElementSibling;
            while (previousStar) {
                previousStar.style.color = "#eab308";
                previousStar.classList.add("las");
                previousStar.classList.remove("lar");
                previousStar = previousStar.previousElementSibling;
            }
        });

        // Clic pour noter
        star.addEventListener("click", function() {
            noteInput.value = this.dataset.value;
        });

        // Effet quand la souris quitte la zone
        star.addEventListener("mouseout", function() {
            resetStars(noteInput.value);
        });
    });

    /**
     * Réinitialiser les étoiles
     * @param {number} nb - La note sélectionnée
     */
    function resetStars(nb = 0) {
        stars.forEach((star) => {
            if (star.dataset.value > nb) {
                star.style.color = "black";
                star.classList.add("lar");
                star.classList.remove("las");
            } else {
                star.style.color = "#eab308";
                star.classList.add("las");
                star.classList.remove("lar");
            }
        });
    }
}