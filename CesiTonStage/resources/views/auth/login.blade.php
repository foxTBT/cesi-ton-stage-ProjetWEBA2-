@extends('layouts.login_app')

@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">



</head>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="flex justify-center items-center ">
    <div class="p-10 m-10 shadow-gray-200 shadow-xl rounded-xl" style="display: flex; flex-direction: column; gap: 8px;">
        <label style="text-align: center; font-family: 'Archivo', sans-serif; font-size: 2em;">CONNEXION</label>
        
        <label>Email:</label>
        <input type="text" name="Email_Account" style="background-color: #d3d3d3;" class="rounded-s placeholder-gray-400 hover:placeholder-gray-200 p-1" placeholder="Entrez votre email">
        
        <label>Mot de passe :</label>
        <input type="text" name="Password_Account" style="background-color: #d3d3d3;" class="rounded-s placeholder-gray-400 hover:placeholder-gray-200 p-1" placeholder="Entrez votre mot de passe">
        
        <p style="text-align: right; font-size: 12px" class ="text-gray-600"> mot de passe oublié ?</p>
        
        <!-- Conteneur pour centrer uniquement le bouton -->
        <div style="display: flex; justify-content: center;">
            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-4 px-6 rounded-xl w-30">
                Se connecter
            </button>
        </div>
    </div>
</div>

    <!-- Popup pour l'acceptation des cookies -->
    
    @php
        $acceptedCookies = request()->cookie('accept_cookies') ? true : false;
    @endphp

    @if (!$acceptedCookies)
        <div id="popup" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <p class="mb-4">Veuillez accepter les cookies</p>
                <button onclick="accept()" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Accepter</button>
                <button onclick="reject()" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Refuser</button>
            </div>
        </div>
    @endif

        </div>
    </div>

    
    <script>
        window.onload = function () {
            let acceptCookies = document.cookie.includes('accept_cookies=true');
            if (!acceptCookies) {
                document.getElementById("popup").style.display = "flex";
            }
        }
    
        function accept() {
            document.getElementById("popup").style.display = "none";
    
            fetch("{{ route('accept.cookies') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ accept: true })
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    document.cookie = "accept_cookies=true; path=/; max-age=" + (30 * 24 * 60 * 60);
                }
            });
        }
    
        function reject() {
            document.getElementById("popup").style.display = "none";
    
            fetch("{{ route('reject.cookies') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ accept: false })
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    document.cookie = "accept_cookies=false; path=/; max-age=" + (30 * 24 * 60 * 60);
                }
            });
        }
    </script>
    

</form>

@endsection