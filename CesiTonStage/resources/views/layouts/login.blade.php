<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CTS</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Intégration de Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <!-- Header -->
    <header class="flex flex-col items-center bg-transparent w-full border shadow-gray-800 shadow-xl">
        <div class=" "></div>
            <div class="logo my-2">
                <img src="{{ asset('images/logoj_petit.svg') }}" alt="Logo CTS" class="w-[7em] mx-auto">
                @php
                dump(request()->cookie('accept_cookies'));
            @endphp
            
            </div>
            
        </div>
        
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-auto">
        <div class="bg-gray-800">
            <div class="flex">
                <div class="w-1/2 p-4">
                    <div class="p-4 mb-4 text-yellow-400">
                        <strong class="text-yellow-300">Ressource</strong>
                        <p><a href="{{ route('cookie.settings') }}" class="hover:text-yellow-600 cursor-pointer">Politique de protection des données</a></p>
                        <p class="hover:text-yellow-600 cursor-pointer">Support</p>
                        <p class="hover:text-yellow-600 cursor-pointer">Condition générales d’utilisation</p>
                    </div>
                </div>
                <div class="w-1/2 p-4">
                    <div class="p-4 mb-4 text-yellow-400">
                        <strong class="text-yellow-300">En savoir plus</strong>
                        <p class="hover:text-yellow-600 cursor-pointer">Qui sommes de nous</p>
                        <p class="hover:text-yellow-600 cursor-pointer">Nos valeurs</p>
                        <p class="hover:text-yellow-600 cursor-pointer">FAQ</p>
                    </div>
                </div>
            </div>
        </div>
          
        
        <strong class="bg-black text-white text-left text-base block w-full">&#169;2025 - Tous droits réservés - Web4All</strong>

    </footer>


    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
