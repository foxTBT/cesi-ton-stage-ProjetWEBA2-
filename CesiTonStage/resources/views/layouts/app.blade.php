<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeBonPlan</title>
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
                <img src="{{ asset('images/logoj_petit.svg') }}" alt="Logo LeBonPlan" class="w-[15em] mx-auto">
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
                    <li><a href="#" class="hover:text-[#ec6f35]">Connexion</a></li>
                    <li><a href="#" class="bg-white text-black font-bold py-1 px-3 rounded hover:text-[#ec6f35]">S'inscrire</a></li>
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
