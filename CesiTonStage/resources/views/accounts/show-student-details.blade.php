@extends('layouts.app')

@section('content')

<div class="max-w-100 mx-auto bg-gray-100 shadow-lg rounded-lg p-6 border mb-4">
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
    <ul class="text-gray-600 space-y-1 mt-3">
        @foreach($account->application as $application)
        <div class="max-w-100 mx-auto bg-white shadow-lg rounded-lg p-6 border mb-4">

            <li><strong>Titre :</strong> {{ $application->offer->Title_Offer }}</li>
            <li><strong>Description :</strong> {{ $application->offer->Description_Offer }}</li>
            <li><strong>Salaire :</strong> {{ $application->offer->Salary_Offer }}</li>
            <li><strong>Date de début :</strong> {{ $application->offer->Begin_date_Offer }}</li>
            <li><strong>Durée :</strong> {{ $application->offer->Duration_Offer }}</li>
            <li><strong>CV :</strong> <a href="{{ $application->Cv_link_Application }}" target="_blank">Voir le CV</a></li>
            <li><strong>Lettre de motivation :</strong> {{ $application->Cover_letter_Application }}</li>
            <li><strong>Date de candidature :</strong> {{ $application->Date_Application }}</li>
        </div>
        @endforeach
    </ul>
    @if (session('account') && session('account')->Id_Role > 1)
    <div class="flex flex-row place-content-evenly mt-4 font-bold">
        <!-- Bouton de mise à jour -->
        <a href="{{ route('accounts.edit', $account->Id_Account) }}" class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:bg-yellow-300 hover:text-black">Mise à jour</a>
        <!-- Bouton de suppression -->
        <form action="{{ route('accounts.destroy', $account->Id_Account) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="source" value="show-student">
            <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-300">Supprimer</button>
        </form>
    </div>
    @endif
</div>

{{-- Si un message d'erreur existe dans la session, on affiche une popup alert --}}
@if (session('error'))
    <script type="text/javascript">
        alert("{{ session('error') }}");
    </script>
@endif



@endsection