@extends('layouts.login_app')

@section('content')

<style>
@keyframes shake {
    0% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    50% { transform: translateX(5px); }
    75% { transform: translateX(-5px); }
    100% { transform: translateX(0); }
  }
  
  .shake-div {
    animation: shake 0.5s ease-in-out; /* Durée et effet */
  }
</style>
  

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">



</head>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="flex justify-center items-center h-1/2">
        <div class="p-20 pt-10 bg-gray-100 shadow-gray-200 shadow-xl rounded-xl {{ $errors->any() ? 'shake-div' : '' }}" style="display: flex; flex-direction: column; gap: 8px;">
            <label style="text-align: center; font-family: 'Archivo', sans-serif; font-size: 2em;">CONNEXION</label>
            
            <label>Email:</label>
            <input value="{{old('Email_Account')}}" type="text" name="Email_Account" style="background-color: #d3d3d3; {{ $errors->has('Email_Account') ? 'border: 2px solid red;' : '' }}" class="rounded-s placeholder-gray-400 hover:placeholder-gray-200 p-1" placeholder="Entrez votre email">
            
            <label>Mot de passe :</label>
            <input type="password" name="Password_Account" style="background-color: #d3d3d3; {{ $errors->has('Password_Account') ? 'border: 2px solid red;' : '' }}" class="rounded-s placeholder-gray-400 hover:placeholder-gray-200 p-1" placeholder="Entrez votre mot de passe">
            
            <p style="text-align: right; font-size: 12px" class ="text-gray-600"> mot de passe oublié ?</p>
            
            <!-- Conteneur pour centrer uniquement le bouton -->
            <div style="display: flex; justify-content: center;">
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-4 px-6 rounded-xl">
                    Se connecter
                </button>
            </div>
            @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        <li>{{ $errors->first('Email_Account') }}</li>
                        <li>{{ $errors->first('Password_Account') }}</li>
                    </ul>
                </div>
            @endif
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
                    window.location.href = document.referrer || '/';
                }
            });
        }
    </script>
    

</form>

@endsection