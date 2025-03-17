@extends('layouts.app')

@section('content')
<div class="max-w-100 mx-auto bg-white shadow-lg rounded-lg p-6 border mb-4">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Mettre à jour le compte</h2>

    <form action="{{ route('account.update', $account->Id_Account) }}" method="POST" class="flex flex-col justify-center">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="Email_Account" class="block text-gray-700">Email :</label>
            <input type="email" name="Email_Account" id="Email_Account" value="{{ $account->Email_Account }}" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label for="First_name_Account" class="block text-gray-700">Prénom :</label>
            <input type="text" name="First_name_Account" id="First_name_Account" value="{{ $account->First_name_Account }}" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label for="Last_name_Account" class="block text-gray-700">Nom :</label>
            <input type="text" name="Last_name_Account" id="Last_name_Account" value="{{ $account->Last_name_Account }}" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label for="Birth_date_Account" class="block text-gray-700">Date de naissance :</label>
            <input type="date" name="Birth_date_Account" id="Birth_date_Account" value="{{ $account->Birth_date_Account }}" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label for="Id_Role" class="block text-gray-700">Rôle :</label>
            <input type="number" name="Id_Role" id="Id_Role" value="{{ $account->Id_Role }}" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <button type="submit" class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:bg-yellow-300 hover:text-black ">Mettre à jour</button>
    </form>
</div>
@endsection