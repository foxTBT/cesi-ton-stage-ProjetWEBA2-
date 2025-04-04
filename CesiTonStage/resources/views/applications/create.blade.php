@extends('layouts.app') <!-- Cette ligne étend le layout 'app', qui peut contenir la structure de base de la page, comme l'en-tête, le pied de page, etc. -->

@section('content') <!-- Début de la section 'content', qui sera insérée dans la section du même nom dans le layout 'app' -->

<!-- Conteneur principal de la page, avec des classes utilitaires pour la mise en page (centré, espacement intérieur) -->
<div class="container mx-auto px-4">
    <!-- Titre de la section -->
    <h1 class="text-center text-xl font-semibold text-gray-800 mb-4">Postuler à l'Offre</h1>

    <!-- Si une erreur est présente dans la session (par exemple, si un problème survient lors de la soumission du formulaire), affiche un message d'erreur -->
    @if(session('error'))
        <div class="bg-red-500 text-white p-3 mb-4 rounded">
            {{ session('error') }} <!-- Affiche l'erreur contenue dans la session -->
        </div>
    @endif

    <!-- Formulaire pour postuler à l'offre d'emploi -->
    <form action="{{ route('applications.store', ['offerId' => $offerId]) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf <!-- Protection CSRF pour éviter les attaques de type Cross-Site Request Forgery -->

        <!-- Champ caché contenant l'ID de l'offre pour lier la candidature à l'offre spécifique -->
        <input type="hidden" name="offer_id" value="{{ $offerId }}">

        <!-- Section pour télécharger le CV -->
        <div class="mb-4">
            <!-- Label pour le champ de téléchargement du CV -->
            <label class="block text-gray-700 font-semibold">Télécharger votre CV (PDF, DOC, DOCX) :</label>
            <!-- Champ de téléchargement de fichier, qui accepte uniquement les fichiers de type PDF, DOC ou DOCX -->
            <input type="file" name="cv" required class="mt-2 block w-full p-2 border rounded">
            
            <!-- Affichage des erreurs de validation pour le champ 'cv' -->
            @error('cv')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p> <!-- Affiche l'erreur en rouge si le champ 'cv' n'est pas valide -->
            @enderror
        </div>

        <!-- Section pour la lettre de motivation (facultative) -->
        <div class="mb-4">
            <!-- Label pour le champ de la lettre de motivation -->
            <label class="block text-gray-700 font-semibold">Lettre de motivation (facultatif) :</label>
            <!-- Champ de texte pour entrer la lettre de motivation -->
            <textarea name="cover_letter" rows="4" class="mt-2 block w-full p-2 border rounded"></textarea>

            <!-- Affichage des erreurs de validation pour le champ 'cover_letter' -->
            @error('cover_letter')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p> <!-- Affiche l'erreur en rouge si le champ 'cover_letter' n'est pas valide -->
            @enderror
        </div>

        <!-- Bouton pour soumettre la candidature -->
        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition">
            Envoyer la candidature
        </button>
    </form>
</div>

@endsection <!-- Fin de la section 'content' -->
