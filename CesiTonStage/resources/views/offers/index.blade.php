@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($offers as $offer)
            <div class="bg-white shadow-md rounded-lg p-4">
                <!-- Nom de l'entreprise -->
                <div class="flex justify-between items-center border-b pb-2">
                    <strong class="text-lg">
                        {{ optional($offer->company)->name ?: 'Entreprise inconnue' }}
                    </strong>
                    <span class="text-red-500" aria-label="Important">📌</span>
                </div>
                
                <!-- Détails de l'offre -->
                <div class="mt-2">
                    <h5 class="text-xl font-semibold">{{ $offer->Title_Offer }}</h5>
                    <p class="text-gray-600">{{ $offer->Description_Offer }}</p>
                    <p class="text-gray-500 text-sm mt-1">
                        Durée : {{ $offer->Duration_Offer ?: 'Non spécifiée' }}
                    </p>
                    <button 
                        class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                        aria-label="Voir description complète"
                    >
                        Description +
                    </button>
                </div>
                
                <!-- Évaluation -->
                <div class="mt-3 flex justify-center text-yellow-400 text-lg" aria-label="Évaluation">
                    ⭐⭐⭐⭐⭐
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
