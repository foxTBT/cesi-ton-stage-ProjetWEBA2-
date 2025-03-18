@extends('layouts.app')

@section('content')
<div class="max-w-100 mx-auto bg-white shadow-lg rounded-lg p-6 border mb-4">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Détails du compte</h2>

    <ul class="text-gray-600 space-y-1 mt-3">
        <li><strong>Email :</strong> {{ $account->Email_Account }}</li>
        <li><strong>Prénom :</strong> {{ $account->First_name_Account }}</li>
        <li><strong>Nom :</strong> {{ $account->Last_name_Account }}</li>
        <li><strong>Date de naissance :</strong> {{ $account->Birth_date_Account }}</li>
        <p><strong>Rôle:</strong> {{ $account->role->Title_Role }}</p>
        <p><strong>Description du rôle:</strong> {{ $account->role->Description_role }}</p>
    </ul>

    <h2 class="text-xl font-semibold text-gray-800 mt-4 mb-4">Offres postulées</h2>
    <ul class="text-gray-600 space-y-1 mt-3 ">
        
        @foreach($account->offers as $offer)
        <div class="max-w-100 mx-auto bg-white shadow-lg rounded-lg p-6 border mb-4">
            <li><strong>Titre :</strong> {{ $offer->Title_Offer }}</li>
            <li><strong>Description :</strong> {{ $offer->Description_Offer }}</li>
            <li><strong>Salaire :</strong> {{ $offer->Salary_Offer }} <strong>€/an</strong></li>
            <li><strong>Date de début :</strong> {{ $offer->Begin_date_Offer }}</li>
            <li><strong>Durée :</strong> {{ $offer->Duration_Offer }}</li>
        </div>
            @endforeach
        
    </ul>

    <div class="flex flex-row place-content-evenly mt-4 font-bold">
        <!-- Bouton de mise à jour -->
        <a href="{{ route('account.edit', $account->Id_Account) }}" class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:bg-yellow-300 hover:text-black">Mise à jour</a>
        <!-- Bouton de suppression -->
        <form action="{{ route('account.destroy', $account->Id_Account) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="source" value="show-student">
            <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-300">Supprimer</button>
        </form>
    </div>
</div>
@endsection