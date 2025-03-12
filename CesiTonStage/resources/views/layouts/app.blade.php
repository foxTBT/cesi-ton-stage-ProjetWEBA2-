<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTS</title>
    <!-- Intégration de Tailwind CSS via CDN -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <!-- Intégration de JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="script.js"></script>
</head>
<body class="bg-[#f3f3f3]">
    <!-- Header -->
    <header class="flex flex-col items-center">
        <div class="bg-yellow-500 w-full border border-black">
            <div class="logo my-2">
                <img src="{{ asset('images/logoj_petit.svg') }}" alt="Logo CTS" class="w-[7em] mx-auto">
            </div>
            
        </div>
        
        
        <nav class="relative w-full bg-black text-white text-[1.3em]">
            <div class="flex items-center justify-between px-4 py-2">
                <button class="menu-toggle text-white text-2xl md:hidden" aria-label="Ouvrir le menu">&#9776;</button>
                <ul id="navList" class="hidden md:flex md:items-center md:gap-4">
                    <li><a href="#" class="hover:text-[#ec6f35]">Accueil</a></li>
                    <li><a href="#" class="hover:text-[#ec6f35]">Entreprises</a></li>
                    <li><a href="#" class="text-[#ec6f35] font-bold hover:text-[#ec6f35]">Offres</a></li>
                    <li><a href="#" class="hover:text-[#ec6f35]">Wishlist</a></li>
                    <li><a href="#" class="hover:text-[#ec6f35]">Contact</a></li>
                </ul>
                <ul class="flex items-center gap-4">
                    @if(session('account'))
                        <li class="text-white font-bold">Bienvenue, {{ session('account')->First_name_Account }}</li>
                        <li><a href="{{ route('logout') }}" class="hover:text-[#ec6f35]">Déconnexion</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-[#ec6f35]">Connexion</a></li>
                        <li><a href="{{ route('create_account.create') }}" class="bg-white text-black font-bold py-1 px-3 rounded hover:text-[#ec6f35]">S'inscrire</a></li>
                    @endif
                </ul>
                
            </div>
            <ul class="flex-col items-start gap-2 p-4 bg-black md:hidden hidden" id="mobileMenu">
                <li><a href="#" class="text-white hover:text-[#ec6f35]">Accueil</a></li>
                <li><a href="#" class="text-white hover:text-[#ec6f35]">Entreprises</a></li>
                <li><a href="#" class="text-[#ec6f35] font-bold hover:text-[#ec6f35]">Offres</a></li>
                <li><a href="#" class="text-white hover:text-[#ec6f35]">Wishlist</a></li>
                <li><a href="#" class="text-white hover:text-[#ec6f35]">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-black text-white text-left text-base py-2 mt-12">
        <div class="bg-gray-500 w-full border border-black">
            <div class="flex flex-wrap flex-col">
                <div class="bg-blue-500 p-4 mb-4">Div 1</div>
                <div class="bg-green-500 p-4">Div 2</div>
                <div class="bg-blue-500 p-4 mb-4">Div 3'''''''''''''''''''''''''''''''''"'"é'"ezrfdssd dsqdsqdq</div>
                <div class="bg-blue-500 p-4 mb-4">Div 4</div>
              </div>
              
        </div>
        
        <p class="ml-4">&#169;2025 - Tous droits réservés - Web4All</p>
    </footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
