@extends('layouts.login')

@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <label>Email:</label>
    <input type="text" name="Email_Account">
    
    <label>Mot de passe :</label>
    <input type="text" name="Password_Account">

    <button type="submit" class="bg-yellow-400  focus:border-yellow-400 focus:bg-yellow-500 hover:border-yellow-500 hover:text-white text-white font-bold py-2 px-4 border-2 rounded border-yellow-400">Se connecter</button>
    <!--
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember">
        <label class="form-check-label" for="remember">Se souvenir de moi</label>
    </div>-->

    <!-- Popup pour l'acceptation des cookies -->
    
    @php
        $acceptedCookies = request()->cookie('accept_cookies') ? true : false;
    @endphp

    @if (!$acceptedCookies)
        <div id="popup" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <p class="mb-4">Veuillez accepter les cookies</p>
                <button onclick="accept()" class="bg-blue-500 text-white px-4 py-2 rounded">Accepter</button>
                <button onclick="reject()" class="bg-red-500 text-white px-4 py-2 rounded">Refuser</button>
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