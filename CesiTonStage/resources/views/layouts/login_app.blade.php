<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Archivo&display=swap" rel="stylesheet">


    <title>CTS</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Intégration de Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <!-- Header -->
    <header class="flex flex-col items-center bg-transparent w-full border shadow-black shadow-xl">
        
        <div class="logo my-4">
            <img src="{{ asset('images/logod_petit.svg') }}" alt="Logo CTS" class="w-[10em] mx-auto">
        </div>
             
    </header>

    <main>
        
        @yield('content')
        
    </main>

    <footer class="mt-auto">
               
        <strong class="bg-black text-white text-left text-base block w-full">&#169;2025 - Tous droits réservés - Web4All</strong>

    </footer>


    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
