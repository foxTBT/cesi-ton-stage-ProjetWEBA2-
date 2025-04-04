<!-- Formulaire de recherche qui envoie une requête à la route 'companies.index' -->
<form action="{{ route('companies.index') }}" class="flex">
    <!-- Champ de recherche, un champ de type 'search' avec un nom 'term' pour saisir des termes de recherche -->
    <input type="search" name="term" class="border-2 border-black p-2 rounded-l-md focus:outline-none hover:bg-yellow-50">
    
    <!-- Bouton de soumission du formulaire avec une icône de recherche -->
    <button type="submit" class="border-2 border-black bg-yellow-500 text-black px-4 py-2 rounded-r-md -ml-px flex items-center justify-center hover:bg-yellow-400">
        <!-- Icône de recherche, affichée à l'intérieur du bouton, avec un fichier image provenant du dossier d'assets -->
        <img src="{{ asset('images/searching.png') }}" alt="Chercher" class="w-6 h-6">
    </button>
</form>
