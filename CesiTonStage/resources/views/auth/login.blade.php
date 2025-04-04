@extends('layouts.login_app') <!-- Etend le layout 'login_app', permettant de réutiliser des éléments communs comme l'en-tête et le pied de page -->

@section('content') <!-- Début de la section 'content' qui sera remplie dans le layout parent -->

<style>
@keyframes shake {  <!-- Définition d'une animation appelée 'shake' (secousse) -->
    0% { transform: translateX(0); }  <!-- Position initiale -->
    25% { transform: translateX(-5px); }  <!-- Déplace légèrement vers la gauche -->
    50% { transform: translateX(5px); }  <!-- Déplace légèrement vers la droite -->
    75% { transform: translateX(-5px); }  <!-- Retourne légèrement à gauche -->
    100% { transform: translateX(0); }  <!-- Retour à la position initiale -->
}

.shake-div {  <!-- Classe pour appliquer l'animation -->
    animation: shake 0.5s ease-in-out; /* Applique l'animation 'shake' avec une durée de 0.5s et un effet d'accélération/décélération */
}
</style>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Génère un token CSRF pour la sécurité du formulaire (protection contre les attaques CSRF) -->
</head>

<form action="{{ route('login') }}" method="POST"> <!-- Définition d'un formulaire de connexion, envoi les données à la route 'login' via POST -->
    @csrf <!-- Directives Blade pour inclure le token CSRF dans le formulaire -->
    
    <div class="flex justify-center items-center h-1/2"> <!-- Flexbox pour centrer le formulaire verticalement et horizontalement -->
        <div class="rounded-xl shadow-gray-200 shadow-xl bg-yellow-400 p-3 {{ $errors->any() ? 'shake-div' : '' }}"> <!-- Applique une bordure arrondie et une ombre, l'animation 'shake' est ajoutée en cas d'erreur -->
            <div class="p-20 pt-10 bg-gray-100 rounded-xl" style="display: flex; flex-direction: column; gap: 8px;"> <!-- Conteneur du formulaire avec un espacement entre les éléments -->

                <label style="text-align: center; font-family: 'Archivo', sans-serif; font-size: 2em;">CONNEXION</label> <!-- Titre 'Connexion' centré avec une taille de police grande (2em) -->

                <label>Email :</label> <!-- Label pour le champ de l'email -->
                <input value="{{old('Email_Account')}}" type="text" name="Email_Account" style="background-color: #d3d3d3; {{ $errors->has('Email_Account') ? 'border: 2px solid red;' : '' }}" class="rounded-s placeholder-gray-400 hover:placeholder-gray-200 p-1" placeholder="Entrez votre email"> 
                <!-- Champ de saisie pour l'email, la valeur précédente est conservée avec 'old('Email_Account')', une bordure rouge est appliquée si une erreur est présente -->

                <label>Mot de passe :</label> <!-- Label pour le champ du mot de passe -->
                <input type="password" name="Password_Account" style="background-color: #d3d3d3; {{ $errors->has('Password_Account') ? 'border: 2px solid red;' : '' }}" class="rounded-s placeholder-gray-400 hover:placeholder-gray-200 p-1" placeholder="Entrez votre mot de passe">
                <!-- Champ de saisie pour le mot de passe, le texte saisi est masqué. Comme pour l'email, une bordure rouge est ajoutée en cas d'erreur -->

                <p style="text-align: right; font-size: 12px" title="Cette fonctionnalité n'a pas encore été implémentée..." class ="text-gray-600 hover:text-yellow-500"> Mot de passe oublié ?</p>
                <!-- Lien 'Mot de passe oublié ?', avec un texte gris et un effet au survol, indique qu'il n'est pas encore fonctionnel via un tooltip -->

                <div style="display: flex; justify-content: center;"> <!-- Centrer le bouton de soumission -->
                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-4 px-6 rounded-xl">
                        Se connecter <!-- Texte du bouton -->
                    </button>
                </div>

                @if ($errors->any()) <!-- Vérification des erreurs de validation du formulaire -->
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
    <!-- Vérification si l'utilisateur a déjà accepté les cookies -->
    @php
        $acceptedCookies = request()->cookie('accept_cookies') ? true : false;  
    @endphp

    @if (!$acceptedCookies) <!-- Si l'utilisateur n'a pas accepté les cookies, afficher un pop-up -->
        <div id="popup" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center"> <!-- Pop-up avec un fond semi-transparent -->
            <div class="bg-white p-8 rounded-lg shadow-lg text-center"> <!-- Conteneur du pop-up -->
                <p class="mb-4">Veuillez accepter les cookies</p> <!-- Message d'information -->
                <button onclick="accept()" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Accepter</button> <!-- Bouton pour accepter les cookies -->
                <button onclick="reject()" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Refuser</button> <!-- Bouton pour refuser les cookies -->
            </div>
        </div>
    @endif

    <script>
        window.onload = function () {
            let acceptCookies = document.cookie.includes('accept_cookies=true'); <!-- Vérification du cookie pour savoir si l'utilisateur a accepté les cookies -->
            if (!acceptCookies) { <!-- Si l'utilisateur n'a pas accepté les cookies, afficher le pop-up -->
                document.getElementById("popup").style.display = "flex";
            }
        }

        function accept() {
            document.getElementById("popup").style.display = "none"; //Masque le pop-up après l'acceptation
        
            fetch("{{ route('accept.cookies') }}", { //Envoie une requête pour enregistrer l'acceptation des cookies
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"), //Ajoute le token CSRF pour la sécurité
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ accept: true }) //Envoie 'true' pour indiquer l'acceptation des cookies
            }).then(response => response.json()).then(data => {
                if (data.success) { //Si l'acceptation est réussie
                    document.cookie = "accept_cookies=true; path=/; max-age=" + (30 * 24 * 60 * 60); //Crée un cookie 'accept_cookies' pour 30 jours
                }
            });
        }

        function reject() {
            document.getElementById("popup").style.display = "none"; //Masque le pop-up après le rejet

            fetch("{{ route('reject.cookies') }}", { //Envoie une requête pour enregistrer le rejet des cookies
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"), //Ajoute le token CSRF pour la sécurité
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ accept: false }) //Envoie 'false' pour indiquer le rejet des cookies
            }).then(response => response.json()).then(data => {
                if (data.success) { //Si le rejet est réussi
                    document.cookie = "accept_cookies=false; path=/; max-age=" + (30 * 24 * 60 * 60); //Crée un cookie pour le rejet des cookies pendant 30 jours
                    window.location.href = document.referrer || '/'; //Redirige l'utilisateur vers la page précédente ou la page d'accueil
                }
            });
        }
    </script>

</form>

@endsection <!-- Fin de la section 'content' -->
