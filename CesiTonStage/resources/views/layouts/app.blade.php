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

    <style>
        #shimmerDiv {
            width: 100%;
            height: 100%; /* Ajustez la hauteur si nécessaire */
            border: 1px solid black;
            box-shadow: 0 0 10px #f9a825, 0 0 20px #cd820b, 0 0 30px #633e03;
            background: linear-gradient(11270deg, #f9a825, #ffcc00, #ffd500, #ffbf00);
            background-size: 600% 600%; /* Ajustez la taille du dégradé pour un effet plus doux */
            animation: gradientAnimation 10s ease infinite; /* Animation continue */
        }
        
        
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    <!-- Header -->
    <header class="flex flex-col items-center bg-red-500">
        <div class="bg-yellow-500 w-full border border-black" id="shimmerDiv">
            <div class="logo my-2">
                <img src="{{ asset('images/logoj_petit.svg') }}" alt="Logo CTS" class="w-[7em] mx-auto">
                @php
                dump(request()->cookie('accept_cookies'));
            @endphp
            
            </div>
            
        </div>
        
        
        <nav class="sticky top-0 w-full bg-zinc-800 text-white text-[1.3em]">
            <div class="sticky top-0 flex items-center justify-between px-4 py-2">
                <button class="menu-toggle text-white text-2xl md:hidden" aria-label="Ouvrir le menu">&#9776;</button>
                <ul id="navList" class="hidden md:flex md:items-center md:gap-4">
                    <li><a href="#" class="hover:text-yellow-500">Accueil</a></li>
                    <li><a href="#" class="hover:text-yellow-500">Entreprises</a></li>
                    <li><a href="#" class="text-yellow-500 font-bold hover:text-yellow-500">Offres</a></li>
                    <li><a href="#" class="hover:text-yellow-500">Wishlist</a></li>
                    <li><a href="{{ route('account.create') }}" class="hover:text-yellow-500">Créer un compte étudiant</a></li>
                </ul>
                <ul class="flex items-center gap-4">
                    @if(session('account'))
                        <li class="text-white font-bold">Bienvenue, {{ session('account')->First_name_Account }}</li>
                        <li><a href="{{ route('logout') }}" class="hover:text-yellow-500 ml-4">Déconnexion</a></li>
                    @else

                        <li><a href="{{ route('login') }}" class="hover:text-[#ec6f35]">Connexion</a></li>
                    @endif
                </ul>
                
            </div>
            <ul class="flex-col items-start gap-2 p-4 bg-black md:hidden hidden" id="mobileMenu">
                <li><a href="#" class="text-white font-bold hover:text-yellow-400">Accueil</a></li>
                <li><a href="#" class="text-white font-bold hover:text-yellow-400">Entreprises</a></li>
                <li><a href="#" class="text-yellow-500 font-bold hover:text-yellow-400">Offres</a></li>
                <li><a href="#" class="text-white font-bold hover:text-yellow-400">Wishlist</a></li>
                <li><a href="/account/create" class="text-white font-bold hover:text-yellow-400">Créer un compte étudiant</a></li>
            </ul>
        </nav>
    </header>

    <main class="flex-grow">
   
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
          
        
        <strong class="bg-black text-white text-left text-base block w-full mt-auto">&#169;2025 - Tous droits réservés - Web4All</strong>

    </footer>


    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
