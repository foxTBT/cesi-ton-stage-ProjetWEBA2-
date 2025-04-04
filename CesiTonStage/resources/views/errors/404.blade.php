<!DOCTYPE html> <!-- Déclare que ce document est un fichier HTML5 -->
<html lang="fr"> <!-- Déclare que la langue du document est le français -->
<head>
    <!-- Métadonnées du document HTML -->
    <meta charset="UTF-8"> <!-- Définit l'encodage des caractères à UTF-8 pour gérer les caractères spéciaux (accents, etc.) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Permet d'adapter la page aux différentes tailles d'écran, en particulier pour les appareils mobiles -->
    <title>Page non trouvée</title> <!-- Titre de la page, qui apparaîtra dans l'onglet du navigateur -->
    
    <!-- Inclusion de Tailwind CSS via CDN pour la gestion du style de la page -->
    <script src="https://cdn.tailwindcss.com"></script> <!-- Charge Tailwind CSS, un framework utilitaire pour la mise en forme rapide -->
</head>
<body class="bg-yellow-500 flex items-center justify-center h-screen">
    <!-- Corps de la page -->
    
    <!-- Le conteneur principal avec une classe qui centre son contenu à la fois horizontalement et verticalement -->
    <div class="text-center">
        <!-- Le texte sera centré dans cette div -->
        
        <h1 class="text-6xl font-bold text-gray-800">404</h1>
        <!-- Titre principal avec une grande taille de police (text-6xl), en gras (font-bold), et une couleur de texte gris foncé (text-gray-800) -->
        
        <p class="text-xl text-gray-600 mt-4">Zut de flûte ! La page que vous recherchez est introuvable.</p>
        <!-- Un message expliquant l'erreur 404, avec une taille de police légèrement plus petite (text-xl) et une couleur gris clair (text-gray-600). L'espacement supérieur (mt-4) sépare le texte du titre. -->
        
        <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-gray-800 text-white rounded-lg shadow-7xl hover:bg-gray-700">
            Retour à l'accueil
        </a>

    </div>
</body>
</html>
