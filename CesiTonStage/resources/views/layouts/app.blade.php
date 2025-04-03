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

    

    {{-- <style>
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
    </style> --}}
</head>

<body class="flex flex-col min-h-screen">
    <!-- Header -->
    <header class="flex flex-col items-center bg-red-500">
        <div class="bg-yellow-500 w-full border border-black">
            <div class="logo my-2">
                <a href="/">
                    <img src="{{ asset('images/logoj_petit.svg') }}" alt="Logo CTS" class="w-[7em] mx-auto">
                </a>
                @php
                    $account = session('account');

                    if ($account === null) {
                        dump('null');
                    } else {
                        $roleId = (int) $account->Id_Role;
                        dump($roleId);
                    }
                @endphp




                <!-- @php
                    dump(request()->cookie('accept_cookies'));
                @endphp -->

            </div>

        </div>


        <nav class="sticky top-0 w-full bg-zinc-800 text-white text-[1em]">
            <div class="sticky top-0 flex items-center justify-between px-4 py-2">
                <button class="menu-toggle text-2xl md:hidden" aria-label="Ouvrir le menu">&#9776;</button>
                <ul id="navList" class="hidden md:flex md:items-center md:gap-4">
                    <li><a href="/"
                            class="{{ request()->is('/') ? 'text-yellow-400 font-bold' : 'text-white hover:text-yellow-500' }}">
                            Accueil
                        </a>
                    </li>
                    <li><a href="{{ route('companies.index') }}" class="{{ request()->is('companies/index') ? 'text-yellow-400 font-bold' : 'text-white hover:text-yellow-500' }}">Entreprises</a>
                    </li>
                    <li><a href="#" class="hover:text-yellow-500">Offres</a>
                    </li>
                    @if (session('account') && session('account')->Id_Role == '3')
                        <li>
                            <a href="{{ route('accounts.show-pilote') }}"
                                class="{{ request()->is('accounts/show-pilote') ? 'text-yellow-400 font-bold' : 'text-white hover:text-yellow-500' }}">
                                Voir les comptes pilotes
                            </a>
                        </li>
                    @endif
                    <li><a href="{{ route('accounts.show-student') }}"
                            class="{{ request()->is('accounts/show-student') ? 'text-yellow-400 font-bold' : 'text-white hover:text-yellow-500' }}">
                            Voir les comptes étudiants
                        </a></li>
                    <li><a href="{{ route('accounts.create') }}"
                            class="{{ request()->is('accounts/create') ? 'text-yellow-400 font-bold' : 'text-white hover:text-yellow-500' }}">
                            Créer un compte étudiant
                        </a></li>
                </ul>
                <ul class="flex items-center gap-4">
                    @if (session('account') && session('account')->Id_Role != 1)
                        <li class="text-white font-bold">Bienvenue, {{ session('account')->First_name_Account }}</li>
                        <li><a href="{{ route('logout') }}" class="hover:text-yellow-500 ml-4">Déconnexion</a></li>
                    @elseif (session('account') && session('account')->Id_Role == 1)
                        <li class="text-white font-bold flex justify-between ml-1 mr-1">
                            <a
                                href="{{ route('accounts.show-student-details', ['id' => session('account')->Id_Account]) }}">
                                <img src="{{ asset('images/icon/student-icon.png') }}" alt="Icon étudiant"
                                    class="w-8 h-8 object-cover rounded-full border bg-yellow-300">
                            </a>
                            <a class="ml-4">{{ session('account')->First_name_Account }}</a>
                            <a class="ml-4">{{ session('account')->Last_name_Account }}</a>
                        </li>
                        <li><a href="{{ route('logout') }}" class="hover:text-yellow-500 ml-4">Déconnexion</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-[#ec6f35]">Connexion</a></li>
                    @endif
                </ul>

            </div>
            <ul class="flex-col items-start gap-2 p-4 bg-zinc-900 md:hidden hidden" id="mobileMenu">
                <li><a href="{{ route('welcome') }}" class="menu-item font-bold hover:text-yellow-400">Accueil</a></li>
                <li><a href="{{ route('companies.index') }}"
                        class="menu-item font-bold hover:text-yellow-400">Entreprises</a></li>
                <li><a href="{{ route('offers.index') }}" class="menu-item font-bold hover:text-yellow-400">Offres</a>
                </li>
                @if (session('account') && session('account')->Id_Role == '1')
                    <li><a href="{{ route('wishlist.index') }}"
                            class="menu-item font-bold hover:text-yellow-400">Wishlist</a></li>
                @endif
                @if (session('account') && (session('account')->Id_Role == '2' || session('account')->Id_Role == '3'))
                    <li><a href="{{ route('accounts.show-student') }}"
                            class="menu-item font-bold hover:text-yellow-400">Étudiants</a></li>
                @endif
                @if (session('account') && session('account')->Id_Role == '3')
                    <li><a href="{{ route('accounts.show-pilote') }}"
                            class="menu-item font-bold hover:text-yellow-400 {{ request()->is('accounts/show-pilote') ? 'text-yellow-500' : 'text-white' }}">Pilotes</a>
                    </li>
                @endif
            </ul>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const menuItems = document.querySelectorAll('.menu-item');
                    const currentPath = window.location.pathname;

                    menuItems.forEach(item => {
                        const href = item.getAttribute('href');
                        const routePath = new URL(href, window.location.origin).pathname;

                        if (routePath === currentPath) {
                            item.classList.remove('text-white');
                            item.classList.add('text-yellow-500');
                        } else {
                            item.classList.remove('text-yellow-500');
                            item.classList.add('text-white');
                        }
                    });
                });
            </script>


        </nav>
    </header>

    <main class="mt-[1%] mb-[3%] flex-grow mx-[4%] sm:mx-[8%] md:mx-[12%] lg:mx-[16%] xl:mx-[20%]">

        @yield('content')

    </main>

    <footer class="mt-auto">
        <div class="bg-gray-800">
            <div class="flex">
                <div class="w-1/2 p-4">
                    <div class="p-4 mb-4 text-yellow-400 space-y-1">
                        <strong class="text-yellow-300">Ressource</strong>
                        <p><a href="{{ route('cookie.settings') }}"
                                class="hover:text-yellow-600 cursor-pointer">Politique de protection des données</a></p>
                        <p><a href="{{ route('support.support') }}"
                                class="hover:text-yellow-600 cursor-pointer">Support</a></p>
                        <p><a href="{{ route('cgu.cgu') }}" class="hover:text-yellow-600 cursor-pointer">Condition
                                générales d’utilisation</a></p>
                    </div>
                </div>
                <div class="w-1/2 p-4">
                    <div class="p-4 mb-4 text-yellow-400 space-y-1">
                        <strong class="text-yellow-300">En savoir plus</strong>
                        <p><a href="{{ route('a_propos.qui_sommes_nous') }}"
                                class="hover:text-yellow-600 cursor-pointer">Qui sommes de nous</a></p>
                        <p><a href="{{ route('a_propos.nos_valeurs') }}"
                                class="hover:text-yellow-600 cursor-pointer">Nos valeurs</a></p>
                        <p><a href="{{ route('a_propos.faq') }}" class="hover:text-yellow-600 cursor-pointer">FAQ</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <strong class="bg-zinc-900 text-white text-left text-base block w-full pl-2 mt-auto">&#169;2025 - Tous droits réservés - Web4All</strong>

    </footer>


    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
