<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

<button onclick="afficherCellule_E()" class="px-4 py-2 rounded border-black bg-yellow-400 text-black border-2 hover:border-white hover:bg-yellow-500 hover:text-white">
    <strong>Noter l'entreprise ?</strong>
</button>

<div id="cellule_E" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="mx-auto w-fit bg-white shadow-lg rounded-lg p-4 border">
        <div class="text-center">
            <strong>Quelle note mérite cette entreprise ?</strong>
        </div>

        <form action="{{ route('companies.rate', $company) }}" method="POST" class="mt-4 flex mx-auto w-fit gap-3">
        @csrf
            <div class="stars flex items-center">
                <i class="lar la-star" data-value="1"></i><i class="lar la-star" data-value="2"></i><i class="lar la-star" data-value="3"></i><i class="lar la-star" data-value="4"></i><i class="lar la-star" data-value="5"></i>
            </div>

            <input type="hidden" name="note" id="note" value="0">
            <button type="submit" class="px-1 rounded border-black bg-white text-black border-2 hover:border-yellow-500 hover:bg-yellow-500"><strong>Noter</strong></button>
        </form>

        <div class="text-center mt-4">
            <button onclick="fermerCellule_E()" class="px-4 py-2 rounded border-black bg-yellow-400 text-black border-2 hover:border-yellow-500 hover:bg-white hover:text-yellow-500">
                <strong>Fermer</strong>
            </button>
        </div>
    </div>
</div>

<script>
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
</script>

