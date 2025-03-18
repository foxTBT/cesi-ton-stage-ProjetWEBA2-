@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="my-4 text-center">Liste des Offres</h1>
    <div class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($offers as $offer)
                <div class="bg-white shadow-md rounded-lg p-4 w-80">
                    <!-- Nom de l'entreprise -->
                    <div class="flex justify-between items-center border-b pb-2">
                        <strong class="text-lg">
                            <p>{{ $offer->company?->Name_Company ?? 'N/A' }}</p>
                        </strong>
                        <span class="text-red-500" aria-label="Important">📌</span>
                    </div>
                    <!-- Détails de l'offre -->
                    <div class="mt-2">
                        <h5 class="text-xl font-semibold">{{ $offer->Title_Offer }}</h5>
                        <p class="text-gray-600">{{ $offer->Description_Offer }}</p>
                        <p class="text-gray-600">{{ $offer->Salary_Offer }}</p>
                        <p class="text-gray-500 text-sm mt-1">Date de début : {{ $offer->Begin_date_Offer ?? 'Non spécifiée' }}</p>
                        <p class="text-gray-500 text-sm mt-1">Durée : {{ $offer->Duration_Offer ?? 'Non spécifiée' }}</p>
                        <p class="text-gray-500 text-sm mt-1">Catégorie : {{ $offer->category?->Name_Category ?? 'Non spécifiée' }}</p>
                        <p class="text-gray-500 text-sm mt-1">Status : {{ $offer->Title_Status ?? 'Non spécifiée' }}</p>
                        <p class="text-gray-500 text-sm mt-1">Mail : {{ $offer->Email_Account ?? 'Non spécifiée' }}</p>
                        <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Description +</button>
                    </div>
                    <!-- Évaluation -->
                    <div class="mt-3 flex justify-center text-yellow-400 text-lg" aria-label="Évaluation">
                        ⭐⭐⭐⭐⭐
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
