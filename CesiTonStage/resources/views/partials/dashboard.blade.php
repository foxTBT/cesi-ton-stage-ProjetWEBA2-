<button onclick="afficherCellule_D()" class="px-4 py-2 rounded border-black bg-yellow-400 text-black border-2 hover:border-white hover:bg-yellow-500 hover:text-white">
    <strong>Dashboard</strong>
</button>

<div id="cellule_D" class="hidden fixed inset-0 items-center justify-center bg-black bg-opacity-50">
    <div class="mx-auto w-fit bg-white shadow-lg rounded-lg p-4 border">
        <div class="text-center">
            <strong>Voici quelques chiffres...</strong>
        </div>

        <div class="text-center mt-4">
            <button onclick="fermerCellule_D()" class="px-4 py-2 rounded border-black bg-yellow-400 text-black border-2 hover:border-yellow-500 hover:bg-white hover:text-yellow-500">
                <strong>Fermer</strong>
            </button>
        </div>
    </div>
</div>

<script>
    function afficherCellule_D() {
        document.getElementById("cellule_D").classList.remove("hidden");
    }

    function fermerCellule_D() {
        document.getElementById("cellule_D").classList.add("hidden");
    }
</script>
