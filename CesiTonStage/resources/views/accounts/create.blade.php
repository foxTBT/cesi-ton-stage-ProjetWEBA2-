@extends('layouts.app')

@section('content')
    <div class="max-w-100 mx-auto bg-white shadow-lg rounded-lg p-6 border mt-4">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Créer un compte</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
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

            <button type="submit"
                class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:bg-yellow-300 hover:text-black">Créer
                le compte</button>
        </form>
    </div>
@endsection
