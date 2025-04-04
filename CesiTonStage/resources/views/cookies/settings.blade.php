@extends('layouts.app') <!-- Étend le layout 'app' pour réutiliser la structure commune de la page, comme l'en-tête, le pied de page, etc. -->

@section('content') <!-- Début de la section 'content', qui sera insérée dans la section 'content' du layout 'app' -->

<!-- Conteneur principal pour le contenu, avec des classes de Tailwind CSS pour définir une largeur maximale, espacement, fond gris clair, coins arrondis et une ombre -->
<div class="max-w-4xl mx-auto p-6 bg-gray-100 rounded-lg shadow-md mt-3">

    <!-- Titre principal de la page pour la politique de protection des données -->
    <h2 class="text-2xl font-bold mb-4">Politique de protection des données</h2>

    <!-- Affichage d'un message de succès si un message est présent dans la session -->
    @if(session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }} <!-- Affiche le message de succès stocké dans la session -->
        </div>
    @endif

    <!-- Paragraphe introductif expliquant que l'utilisateur peut gérer ses préférences de cookies -->
    <p class="mb-4">Vous pouvez voir et modifier vos préférences en matière de cookies ci-dessous :</p>

    <!-- Formulaire pour mettre à jour les préférences de cookies -->
    <form action="{{ route('cookie.update') }}" method="POST">
        @csrf <!-- Protection CSRF pour sécuriser la soumission du formulaire -->

        <!-- Section pour la case à cocher afin que l'utilisateur accepte ou refuse les cookies -->
        <div class="mb-4">
            <!-- Label contenant la case à cocher et le texte associé -->
            <label class="flex items-center">
                <!-- Case à cocher qui est marquée comme "checked" si l'utilisateur a déjà accepté les cookies -->
                <input type="checkbox" name="accept_cookies" value="true" class="mr-2" 
                    {{ $cookies['accept_cookies'] ? 'checked' : '' }}> <!-- Si 'accept_cookies' est vrai, la case sera cochée -->
                Accepter le cookie qui dit que vous acceptez d'avoir des cookies
            </label>
        </div>

        <!-- Bouton pour soumettre les préférences de cookies modifiées -->
        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
            Enregistrer les préférences
        </button>
    </form>
</div>

@endsection <!-- Fin de la section 'content' -->
