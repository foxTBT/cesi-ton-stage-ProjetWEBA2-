@extends('layouts.app')

@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg border p-6">

    <h2 class="shadow-lg rounded-lg bg-yellow-500 text-xl font-semibold pt-2 pl-12 pr-12 pb-2 mb-6 text-center">
        <strong>Créer un compte</strong>
    </h2>

    @if (session('success'))
        <div class="alert alert-success text-green-600">{{ session('success') }}</div>
        
    @endif

    
    <form action="{{ route('accounts.store') }}" method="POST">
        @csrf

        <ul class="space-y-3">
            <li>
                <label for="Email_Account" class="block text-gray-700"><strong>Email :</strong></label>
                <input value="{{ old('Email_Account') }}" type="email" name="Email_Account" id="Email_Account"
                    class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Password_Account" class="block text-gray-700"><strong>Mot de passe :</strong></label>
                <input value="{{ old('Password_Account') }}" type="password" name="Password_Account" id="Password_Account"
                    class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="First_name_Account" class="block text-gray-700"><strong>Prénom :</strong></label>
                <input value="{{ old('First_name_Account') }}" type="text" name="First_name_Account" id="First_name_Account"
                    class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Last_name_Account" class="block text-gray-700"><strong>Nom :</strong></label>
                <input value="{{ old('Last_name_Account') }}" type="text" name="Last_name_Account" id="Last_name_Account"
                    class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Birth_date_Account" class="block text-gray-700"><strong>Date de naissance :</strong></label>
                <input value="{{ old('Birth_date_Account') }}" type="date" name="Birth_date_Account" id="Birth_date_Account"
                    class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Id_Role" class="block text-gray-700"><strong>Rôle :</strong></label>
                <select value="{{ old('Id_Role') }}"  name="Id_Role" id="Id_Role" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    <option value="1">Étudiant</option>
                    <option value="2">Pilote</option>
                    <option value="3">Admin</option>
                </select>
            </li>

            <li class="flex items-center">
                <label for="remember" class="text-gray-700 mr-2">Se souvenir de moi</label>
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
            </li>

            <li class="mx-auto w-fit">
                <button type="submit" class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-green-500 hover:bg-green-300 hover:text-black">
                    <strong>Créer le compte</strong>
                </button>
            </li>

            @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </ul>
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
