@extends('layouts.login_app') <!-- Étend le layout 'login_app', permettant de réutiliser des éléments communs comme l'en-tête et le pied de page -->

@section('content') <!-- Début de la section 'content' qui sera remplie dans le layout parent -->

<head>
    <!-- Génère un token CSRF pour la sécurité du formulaire (protection contre les attaques CSRF) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- Début du formulaire de connexion -->
<form action="{{ route('login') }}" method="POST">
    @csrf <!-- Inclus un token CSRF dans le formulaire pour la sécurité -->

    <!-- Div pour centrer le formulaire à la fois verticalement et horizontalement -->
    <div class="flex justify-center items-center h-1/2">
        <!-- Div contenant le formulaire avec une bordure arrondie et une ombre, ajout de la classe 'shake-div' si des erreurs existent -->
        <div class="rounded-xl shadow-gray-600 shadow-xl mb-3 bg-gray-100 p-3 {{ $errors->any() ? 'shake-div' : '' }}">
            <!-- Conteneur du formulaire avec un espacement entre les éléments -->
            <div class="p-20 pt-10 bg-gray-100 rounded-xl" style="display: flex; flex-direction: column; gap: 8px;">
                
                <!-- Titre du formulaire de connexion -->
                <label style="text-align: center; font-family: 'Archivo', sans-serif; font-size: 2em;">CONNEXION</label>

                <!-- Champ pour l'email -->
                <label>Email :</label>
                <!-- Champ de saisie pour l'email, la valeur précédente est conservée avec 'old('Email_Account')', une bordure rouge est appliquée si une erreur est présente -->
                <input value="{{ old('Email_Account') }}" type="text" name="Email_Account" style="background-color: #d3d3d3; {{ $errors->has('Email_Account') ? 'border: 2px solid red;' : '' }}" class="rounded-s placeholder-gray-400 hover:placeholder-gray-200 p-1" placeholder="Entrez votre email">

                <!-- Champ pour le mot de passe -->
                <label>Mot de passe :</label>
                <!-- Champ de saisie pour le mot de passe, avec une bordure rouge en cas d'erreur -->
                <input type="password" name="Password_Account" style="background-color: #d3d3d3; {{ $errors->has('Password_Account') ? 'border: 2px solid red;' : '' }}" class="rounded-s placeholder-gray-400 hover:placeholder-gray-200 p-1" placeholder="Entrez votre mot de passe">

                <!-- Div pour centrer le bouton de soumission -->
                <div style="display: flex; justify-content: center;">
                    <!-- Bouton de soumission du formulaire -->
                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-4 px-6 rounded-xl mt-4">
                        Se connecter <!-- Texte du bouton -->
                    </button>
                </div>

                <!-- Vérification des erreurs de validation du formulaire -->
                @if ($errors->any())
                    <div class="text-red-500"> <!-- Affichage des erreurs en rouge -->
                        <ul>
                            <li>{{ $errors->first('Email_Account') }}</li> <!-- Affiche la première erreur du champ 'Email_Account' -->
                            <li>{{ $errors->first('Password_Account') }}</li> <!-- Affiche la première erreur du champ 'Password_Account' -->
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <!-- Popup pour l'acceptation des cookies -->
    @php
        $acceptedCookies = request()->cookie('accept_cookies') ? true : false;  // Vérification si l'utilisateur a déjà accepté les cookies
    @endphp

    <!-- Si l'utilisateur n'a pas accepté les cookies, afficher un pop-up -->
    @if (!$acceptedCookies)
        <!-- Pop-up avec un fond semi-transparent -->
        <div id="popup" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
            <!-- Conteneur du pop-up -->
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <!-- Message demandant d'accepter les cookies -->
                <p class="mb-4">Veuillez accepter les cookies</p>
                <!-- Boutons pour accepter ou refuser les cookies -->
                
                <!--
                <button onclick="window.location.href='/politique-de-protection-des-donnees'" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                    Accepter
                </button>
                -->

                <a href="{{ route('cookie.settings') }}" class="menu-item font-bold hover:text-yellow-400">Accepter</a>
                
                
                
                <button onclick="reject()" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Refuser</button>
            </div>
        </div>
    @endif



<!-- Lien vers le fichier JavaScript pour gérer la logique du pop-up des cookies -->
<script>
    window.onload = function () {
        let acceptCookies = document.cookie.includes('accept_cookies=true'); // Vérification du cookie
        if (!acceptCookies) { // Si l'utilisateur n'a pas accepté les cookies, afficher le pop-up
            document.getElementById("popup").style.display = "flex";
        }
    }

    function accept() {
        document.getElementById("popup").style.display = "none"; // Masque le pop-up après l'acceptation

        fetch("{{ route('accept.cookies') }}", { // Envoie une requête pour enregistrer l'acceptation des cookies
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"), // Ajoute le token CSRF pour la sécurité
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ accept: true }) // Envoie 'true' pour indiquer l'acceptation des cookies
        }).then(response => response.json()).then(data => {
            if (data.success) { // Si l'acceptation est réussie
                document.cookie = "accept_cookies=true; path=/; max-age=" + (30 * 24 * 60 * 60); // Crée un cookie 'accept_cookies' pour 30 jours
            }
        }).catch(error => {
            console.error('Erreur lors de l\'acceptation des cookies:', error);
        });
    }

    function reject() {
        document.getElementById("popup").style.display = "none"; // Masque le pop-up après le rejet

        fetch("{{ route('reject.cookies') }}", { // Envoie une requête pour enregistrer le rejet des cookies
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"), // Ajoute le token CSRF pour la sécurité
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ accept: false }) // Envoie 'false' pour indiquer le rejet des cookies
        }).then(response => response.json()).then(data => {
            if (data.success) { // Si le rejet est réussi
                document.cookie = "accept_cookies=false; path=/; max-age=" + (30 * 24 * 60 * 60); // Crée un cookie pour le rejet des cookies pendant 30 jours
                window.location.href = document.referrer || '/'; // Redirige l'utilisateur vers la page précédente ou la page d'accueil
            }
        }).catch(error => {
            console.error('Erreur lors du rejet des cookies:', error);
        });
    }
</script>

</form>

<!-- Lien vers le fichier CSS pour l'animation 'shake-div' -->
<link href="{{ asset('css/animation.css') }}" rel="stylesheet">

@endsection <!-- Fin de la section 'content' -->
