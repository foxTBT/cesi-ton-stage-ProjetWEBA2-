<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Définition de l'encodage des caractères en UTF-8 -->
    <meta charset="UTF-8">
    <!-- Configuration de la vue pour les appareils mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Token CSRF pour la sécurité des formulaires -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Lien vers la police "Archivo" depuis Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo&display=swap" rel="stylesheet">

    <!-- Titre de la page affiché dans l'onglet du navigateur -->
    <title>CTS</title>

    <!-- Inclusion de jQuery depuis un CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Inclusion de Tailwind CSS via CDN pour le style -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col h-screen">
    <!-- En-tête de la page -->
    <header class="flex flex-col items-center bg-white w-full border shadow-gray-500 shadow-md mb-[10vh]">
        <div class="my-4">
            <!-- Lien vers la page d'accueil avec le logo -->
            <a href="/">
                <!-- Logo de l'application, centré avec une largeur de 11em -->
                <img src="{{ asset('images/logod_petit.svg') }}" alt="Logo CTS" class="w-[11em] mx-auto">
            </a>
        </div>
    </header>

    <!-- Section principale de la page -->
    <main class="flex-grow">
        <!-- Contenu spécifique de la page inséré ici -->
        @yield('content')
    </main>

    <!-- Pied de page -->
    <footer>
        <!-- Texte de droits d'auteur, avec un fond sombre et du texte blanc -->
        <strong class="bg-zinc-900 text-white text-left text-base block w-full mt-auto">&#169;2025 - Tous droits réservés - Web4All</strong>
    </footer>

    <!-- Inclusion d'un script JavaScript personnalisé -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>