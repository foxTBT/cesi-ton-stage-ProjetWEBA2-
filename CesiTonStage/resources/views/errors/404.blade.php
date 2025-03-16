<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-yellow-500 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-800">404</h1>
        <p class="text-xl text-gray-600 mt-4">Zut de flûte ! La page que vous recherchez est introuvable.</p>
        <a href="{{ url('/accueil') }}" class="mt-6 inline-block px-6 py-3 bg-gray-800 text-white rounded-lg shadow-7xl hover:bg-gray-700">
            Retour à l'accueil
        </a>
    </div>
</body>
</html>
