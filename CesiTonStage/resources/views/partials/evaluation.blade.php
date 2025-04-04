<!-- Chargement d'une feuille de style externe pour des icônes utilisant Line Awesome -->
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

<!-- Bouton pour afficher un formulaire de notation de l'entreprise -->
<button onclick="afficherCellule_E()" class="px-4 py-2 rounded border-black bg-yellow-400 text-black border-2 hover:border-white hover:bg-yellow-500 hover:text-white">
    <strong>Noter l'entreprise ?</strong> <!-- Le texte du bouton -->
</button>

<!-- Div masquée par défaut qui contient le formulaire pour noter l'entreprise -->
<div id="cellule_E" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <!-- Cette div est centrée et superposée à toute la page, avec un fond semi-transparent noir (bg-opacity-50) -->

    <!-- Conteneur du formulaire de notation, avec une ombre et des bords arrondis -->
    <div class="mx-auto w-fit bg-white shadow-lg rounded-lg p-4 border">
        <div class="text-center">
            <!-- Texte demandant la note -->
            <strong>Quelle note mérite cette entreprise ?</strong>
        </div>

        <!-- Formulaire de notation -->
        <form action="{{ route('companies.rate', $company) }}" method="POST" class="mt-4 flex mx-auto w-fit gap-3">
        @csrf <!-- Ajout du token CSRF pour protéger le formulaire contre les attaques -->
        
            <!-- Section des étoiles pour la notation -->
            <div class="stars flex items-center">
                <!-- Icônes d'étoiles qui peuvent être sélectionnées (Line Awesome) -->
                <i class="lar la-star" data-value="1"></i>
                <i class="lar la-star" data-value="2"></i>
                <i class="lar la-star" data-value="3"></i>
                <i class="lar la-star" data-value="4"></i>
                <i class="lar la-star" data-value="5"></i>
            </div>

            <!-- Champ caché pour la valeur de la note (qui sera envoyée avec le formulaire) -->
            <input type="hidden" name="note" id="note" value="0">
            <!-- Bouton pour soumettre la note -->
            <button type="submit" class="px-1 rounded border-black bg-white text-black border-2 hover:border-yellow-500 hover:bg-yellow-500">
                <strong>Noter</strong>
            </button>
        </form>

        <!-- Bouton pour fermer la fenêtre modale -->
        <div class="text-center mt-4">
            <button onclick="fermerCellule_E()" class="px-4 py-2 rounded border-black bg-yellow-400 text-black border-2 hover:border-yellow-500 hover:bg-white hover:text-yellow-500">
                <strong>Fermer</strong> <!-- Texte du bouton de fermeture -->
            </button>
        </div>
    </div>
</div>

<!-- Lien vers un fichier JavaScript externe contenant la logique de la page (ex: pour afficher et fermer la fenêtre modale) -->
<script src="{{ asset('js/script.js') }}"></script>
