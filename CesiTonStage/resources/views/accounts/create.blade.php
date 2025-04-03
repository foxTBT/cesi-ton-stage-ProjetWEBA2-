@extends('layouts.app')

@section('content')
    <div class="max-w-100 mx-auto bg-white shadow-lg rounded-lg p-6 border mt-4">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Créer un compte</h2>

        @if (session('success'))
            <div class="alert alert-success text-green-600">{{ session('success') }}</div>
            
        @endif

        
        <form action="{{ route('accounts.store') }}" method="POST" class="flex flex-col justify-center">
            @csrf

            <div class="mb-4">
                <label for="Email_Account" class="block text-gray-700">Email :</label>
                <input value="{{ old('Email_Account') }}" type="email" name="Email_Account" id="Email_Account" class="w-full px-4 py-2 border rounded-lg"
                    required>
            </div>

            <div class="mb-4">
                <label for="Password_Account" class="block text-gray-700">Mot de passe :</label>
                <input value="{{ old('Password_Account') }}" type="password" name="Password_Account" id="Password_Account"
                    class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="First_name_Account" class="block text-gray-700">Prénom :</label>
                <input value="{{ old('First_name_Account') }}" type="text" name="First_name_Account" id="First_name_Account"
                    class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="Last_name_Account" class="block text-gray-700">Nom :</label>
                <input value="{{ old('Last_name_Account') }}" type="text" name="Last_name_Account" id="Last_name_Account"
                    class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="Birth_date_Account" class="block text-gray-700">Date de naissance :</label>
                <input value="{{ old('Birth_date_Account') }}" type="date" name="Birth_date_Account" id="Birth_date_Account"
                    class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label value="{{ old('Id_Role') }}" for="Id_Role" class="block text-gray-700">Rôle :</label>
                <select name="Id_Role" id="Id_Role" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="1">Étudiant</option>
                    <option value="2">Pilote</option>
                    <option value="3">Admin</option>
                </select>
            </div>

            <div class="mb-4 flex items-center">
                <label for="remember" class="text-gray-700 mr-2">Se souvenir de moi</label>
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
            </div>

            <button type="submit" class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:bg-yellow-300 hover:text-black">
                Créer le compte
            </button>

                @if ($errors->any())
                    <div class="text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

        </form>

    </div>

    <script>
        // Vérifier si l'utilisateur est connecté
        if ({{ session('account') ? 'true' : 'false' }}) {
            const userRole = {{ session('account')->Id_Role }}; // récupère l'Id_Role de l'utilisateur connecté
    
            document.querySelector('form').addEventListener('submit', function (event) {
                const selectedRole = parseInt(document.getElementById('Id_Role').value);
    
                // Vérifier si le rôle sélectionné est supérieur ou égal au rôle de l'utilisateur connecté
                if (selectedRole >= userRole) {
                    alert("Vous n'avez pas les permissions pour pouvoir créer ce rôle.");
                    event.preventDefault(); // Empêche l'envoi du formulaire si les rôles ne correspondent pas
                }
            });
        } 
        
        else {
            // Rediriger vers la page d'accueil si l'utilisateur n'est pas connecté
            window.location.href = '/'; // Remplace '/' par l'URL d'accueil de ton site si nécessaire
        }
    </script>
    
@endsection
