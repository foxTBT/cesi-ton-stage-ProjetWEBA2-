@extends('layouts.app')

@section('content')
<div class="max-w-100 mx-auto bg-white shadow-lg rounded-lg p-6 border mb-4">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Détails du compte</h2>

    <ul class="text-gray-600 space-y-1 mt-3">
        <li><strong>Email :</strong> {{ $account->Email_Account }}</li>
        <li><strong>Prénom :</strong> {{ $account->First_name_Account }}</li>
        <li><strong>Nom :</strong> {{ $account->Last_name_Account }}</li>
        <li><strong>Date de naissance :</strong> {{ $account->Birth_date_Account }}</li>
        <li><strong>Rôle :</strong> {{ $account->Id_Role }}</li>
    </ul>

    <!-- Bouton de mise à jour -->
    <a href="{{ route('account.edit', $account->Id_Account) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</a>

    <!-- Bouton de suppression -->
    <form action="{{ route('account.destroy', $account->Id_Account) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="source" value="show-account">
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
    </form>
</div>
@endsection