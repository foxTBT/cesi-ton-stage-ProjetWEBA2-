@extends('layouts.app') <!-- Indique que ce fichier étend un modèle de mise en page appelé 'app'. Cela insère ce contenu dans la structure définie dans 'layouts.app'. -->

<html class="bg-yellow-500 text-gray-800"> <!-- Début du tag HTML avec des classes Tailwind pour définir l'arrière-plan jaune et le texte gris foncé -->

@section('content') <!-- Début de la section 'content', qui sera insérée dans la mise en page définie dans 'app' -->

<!-- Hero Section -->
<section class="text-center py-20"> <!-- Section héroïque (grande bannière) centrée avec un padding vertical de 20 unités -->
    <h1 class="text-3xl font-bold">Trouvez votre stage idéal en quelques clics !</h1> <!-- Titre principal, de taille 3xl et en gras -->
    <p class="mt-4 text-lg text-gray-600">Explorez les meilleures opportunités de stage dans des entreprises de renom.</p> <!-- Paragraphe de description avec un léger espacement au-dessus et une couleur de texte gris clair -->
    <a href="/offers" class="mt-6 inline-block border-2 border-gray-800 bg-gray-800 text-gray-100 py-3 px-8 rounded-lg text-lg hover:bg-gray-100 hover:text-gray-800"> <!-- Lien vers les offres de stage avec des styles de bouton, bordure et arrière-plan gris foncé, texte gris clair, padding et coins arrondis -->
        <strong>Les offres de stage</strong> <!-- Texte du lien en gras -->
    </a>
</section>

<!-- Section des entreprises partenaires -->
<section class="shadow-lg rounded-lg bg-gray-100 p-[8%]"> <!-- Section avec une ombre portée, coins arrondis, fond gris clair et padding à 8% -->
    <div class="max-w-7xl mx-auto px-6 text-center"> <!-- Conteneur centré avec une largeur maximale, padding horizontal et texte centré -->
        <h2 class="text-3xl font-bold mb-8">Nos entreprises partenaires</h2> <!-- Titre secondaire en taille 3xl, gras et un espacement inférieur de 8 unités -->
        <div class="flex justify-center"> <!-- Conteneur flex pour centrer les éléments -->
            <!-- Affichage des logos des entreprises partenaires -->
            <img src="{{ asset('images/logo/talentis.png') }}" alt="Logo Talentis" class="mx-auto w-20 h-20 rounded-full hover:opacity-60"> <!-- Logo Talentis avec une taille de 20x20, arrondi et opacité réduite au survol -->
            <img src="{{ asset('images/logo/traverse_ta_rue.png') }}" alt="Logo Traverse Ta Rue" class="mx-auto w-20 h-20 bg-gray-800 rounded-full hover:opacity-60"> <!-- Logo Traverse Ta Rue avec un fond gris foncé et effet au survol -->
            <img src="{{ asset('images/logo/stage_finder.png') }}" alt="Logo Stage Finder" class="mx-auto w-20 h-20 bg-gray-300 rounded-full hover:opacity-60"> <!-- Logo Stage Finder avec un fond gris clair et effet au survol -->
        </div>
    </div>
</section>

{{-- Si un message d'erreur existe dans la session, on affiche une popup alert --}}
@if (session('error')) <!-- Condition pour vérifier si un message d'erreur existe dans la session -->
    <script type="text/javascript"> <!-- Script JavaScript pour afficher une alerte -->
        alert("{{ session('error') }}"); <!-- Affiche l'erreur contenue dans la session -->
    </script>
@endif

</html> <!-- Fin de la balise HTML -->

@endsection <!-- Fin de la section 'content' -->

</html> <!-- Fin de la balise HTML -->
