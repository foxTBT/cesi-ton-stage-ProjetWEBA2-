<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Définition du jeu de caractères utilisé pour la page -->
    <meta charset="UTF-8">
    
    <!-- Définition de la vue pour les appareils mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Protection CSRF pour les formulaires Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Titre de la page affiché dans l'onglet du navigateur -->
    <title>CTS</title>

    <!-- Inclusion de jQuery à partir d'un CDN externe -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Intégration de Tailwind CSS via un CDN externe pour la mise en page et les styles -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="flex flex-col min-h-screen">
    <!-- Section Header (En-tête de la page) -->
    <header class="flex flex-col items-center bg-red-500">
        <div class="bg-yellow-500 w-full border border-black">
            <div class="logo my-2">
                <!-- Logo de la page avec lien vers la page d'accueil -->
                <a href="/">
                    <img src="{{ asset('images/logoj_petit.svg') }}" alt="Logo CTS" class="w-[7em] mx-auto">
                </a>
            </div>
        </div>

        <!-- Barre de navigation (Navigation Bar) -->
        <nav class="sticky top-0 w-full bg-zinc-800 text-white text-[1em]">
            <div class="sticky top-0 flex items-center justify-between px-4 py-2">
                <!-- Bouton menu mobile pour ouvrir/fermer -->
                <button class="menu-toggle text-2xl md:hidden" aria-label="Ouvrir le menu">&#9776;</button>

                <!-- Navigation pour les écrans de taille moyenne et plus -->
                <ul id="navList" class="hidden md:flex md:items-center md:gap-4">
                    <!-- Lien vers la page d'accueil -->
                    <li><a href="{{ route('welcome') }}" class="menu-item font-bold hover:text-yellow-400">Accueil</a></li>

                    <!-- Lien vers la liste des entreprises -->
                    <li><a href="{{ route('companies.index') }}" class="menu-item font-bold hover:text-yellow-400">Entreprises</a></li>

                    <!-- Condition pour afficher le lien "Offres" si l'utilisateur est connecté -->
                    @if (session('account'))
                    <li><a href="{{ route('offers.index') }}" class="menu-item font-bold hover:text-yellow-400">Offres</a></li>
                    @endif

                    <!-- Lien "Wishlist" visible si l'utilisateur a un rôle spécifique -->
                    @if (session('account') && session('account')->Id_Role == '1')
                        <li><a href="{{ route('wishlist.index') }}" class="menu-item font-bold hover:text-yellow-400">Wishlist</a></li>
                    @endif

                    <!-- Lien vers la page des étudiants selon le rôle de l'utilisateur -->
                    @if (session('account') && (session('account')->Id_Role == '2' || session('account')->Id_Role == '3'))
                        <li><a href="{{ route('accounts.show-student') }}" class="menu-item font-bold hover:text-yellow-400">Étudiants</a></li>
                    @endif

                    <!-- Lien vers la page des pilotes, visible seulement pour certains utilisateurs -->
                    @if (session('account') && session('account')->Id_Role == '3')
                        <li><a href="{{ route('accounts.show-pilote') }}" class="menu-item font-bold hover:text-yellow-400 {{ request()->is('accounts/show-pilote') ? 'text-yellow-500' : 'text-white' }}">Pilotes</a></li>
                    @endif
                </ul>

                <!-- Liste des liens pour la gestion de la session de l'utilisateur -->
                <ul class="flex items-center gap-4">
                    <!-- Affichage du nom de l'utilisateur et des options de déconnexion -->
                    @if (session('account') && session('account')->Id_Role != 1)
                        <li class="text-white font-bold">Bienvenue, {{ session('account')->First_name_Account }}</li>
                        <li><a href="{{ route('logout') }}" class="hover:text-yellow-500 ml-4">Déconnexion</a></li>
                    @elseif (session('account') && session('account')->Id_Role == 1)
                        <li class="text-white font-bold flex justify-between ml-1 mr-1">
                            <!-- Icone utilisateur -->
                            <a href="{{ route('accounts.show-student-details', ['id' => session('account')->Id_Account]) }}">
                                <img src="{{ asset('images/icon/student-icon.png') }}" alt="Icon étudiant" class="w-8 h-8 object-cover rounded-full border bg-yellow-300">
                            </a>
                            <!-- Affichage des noms de l'utilisateur -->
                            <a class="ml-4">{{ session('account')->First_name_Account }}</a>
                            <a class="ml-4">{{ session('account')->Last_name_Account }}</a>
                        </li>
                        <li><a href="{{ route('logout') }}" class="hover:text-yellow-500 ml-4">Déconnexion</a></li>
                    @else
                        <!-- Lien vers la page de connexion -->
                        <li><a href="{{ route('login') }}" class="hover:text-[#ec6f35]">Connexion</a></li>
                    @endif
                </ul>

            </div>

            <!-- Menu mobile pour les petits écrans -->
            <ul class="flex-col items-start gap-2 p-4 bg-zinc-900 md:hidden hidden" id="mobileMenu">
                <li><a href="{{ route('welcome') }}" class="menu-item font-bold hover:text-yellow-400">Accueil</a></li>
                <li><a href="{{ route('companies.index') }}" class="menu-item font-bold hover:text-yellow-400">Entreprises</a></li>
                @if (session('account'))
                <li><a href="{{ route('offers.index') }}" class="menu-item font-bold hover:text-yellow-400">Offres</a></li>
                @endif
                @if (session('account') && session('account')->Id_Role == '1')
                    <li><a href="{{ route('wishlist.index') }}" class="menu-item font-bold hover:text-yellow-400">Wishlist</a></li>
                @endif
                @if (session('account') && (session('account')->Id_Role == '2' || session('account')->Id_Role == '3'))
                    <li><a href="{{ route('accounts.show-student') }}" class="menu-item font-bold hover:text-yellow-400">Étudiants</a></li>
                @endif
                @if (session('account') && session('account')->Id_Role == '3')
                    <li><a href="{{ route('accounts.show-pilote') }}" class="menu-item font-bold hover:text-yellow-400 {{ request()->is('accounts/show-pilote') ? 'text-yellow-500' : 'text-white' }}">Pilotes</a></li>
                @endif
            </ul>

        </nav>
    </header>

    <!-- Contenu principal de la page -->
    <main class="mt-[1%] mb-[3%] flex-grow mx-[4%] sm:mx-[8%] md:mx-[12%] lg:mx-[16%] xl:mx-[20%]">
        <!-- Contenu spécifique à chaque page -->
        @yield('content')
    </main>

    <!-- Section Footer (Pied de page) -->
    <footer class="mt-auto">
        <div class="bg-gray-800">
            <div class="flex">
                <div class="w-1/2 p-4">
                    <!-- Liens vers les ressources (politique de confidentialité, support, etc.) -->
                    <div class="p-4 mb-4 text-yellow-400 space-y-1">
                        <strong class="text-yellow-300">Ressource</strong>
                        <p><a href="{{ route('cookie.settings') }}" class="hover:text-yellow-600 cursor-pointer">Politique de protection des données</a></p>
                        <p><a href="{{ route('support.support') }}" class="hover:text-yellow-600 cursor-pointer">Support</a></p>
                        <p><a href="{{ route('cgu.cgu') }}" class="hover:text-yellow-600 cursor-pointer">Conditions générales d’utilisation</a></p>
                    </div>
                </div>
                <div class="w-1/2 p-4">
                    <!-- Liens vers des informations supplémentaires (qui sommes-nous, valeurs, FAQ) -->
                    <div class="p-4 mb-4 text-yellow-400 space-y-1">
                        <strong class="text-yellow-300">En savoir plus</strong>
                        <p><a href="{{ route('a_propos.qui_sommes_nous') }}" class="hover:text-yellow-600 cursor-pointer">Qui sommes nous</a></p>
                        <p><a href="{{ route('a_propos.nos_valeurs') }}" class="hover:text-yellow-600 cursor-pointer">Nos valeurs</a></p>
                        <p><a href="{{ route('a_propos.faq') }}" class="hover:text-yellow-600 cursor-pointer">FAQ</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <strong class="bg-zinc-900 text-white text-left text-base block w-full pl-2 mt-auto">&#169;2025 - Tous droits réservés - Web4All</strong>

    </footer>

    <!-- Inclusion du fichier JavaScript -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
