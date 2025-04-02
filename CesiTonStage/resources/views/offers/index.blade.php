@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="my-4 text-center text-xl font-semibold text-gray-800 mb-4">Liste des Offres</h1>
    
    <!-- Bouton pour créer une offre -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('offers.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            + Créer une offre
        </a>
    </div>

    <div class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($offers as $offer)
                <div class="bg-white shadow-md rounded-lg p-4 w-80">
                    <!-- Nom de l'entreprise -->
                    <div class="flex justify-between items-center border-b pb-2">
                        <strong class="text-lg">
                            <p>{{ $offer->company?->Name_Company ?? 'N/A' }}</p>
                        </strong>
                        @php
                        $isInWishlist = auth()->check() && auth()->user()->wishlist()->where('Id_Offer', $offer->Id_Offer)->exists();
                    @endphp
                    
                    <button class="wishlist-btn" data-offer-id="{{ $offer->Id_Offer }}">
                        <span class="wishlist-icon">{{ $isInWishlist ? '❤️' : '🤍' }}</span>
                    </button>
                    
                    </div>
                    <!-- Détails de l'offre -->
                    <div class="mt-2">
                        <h5 class="text-xl font-semibold">{{ $offer->Title_Offer }}</h5>
                        <p class="text-gray-600">Salaire /an : {{ $offer->Salary_Offer }}</p>
                        <p class="text-gray-500 text-sm mt-1">Date de début : {{ $offer->Begin_date_Offer ?? 'Non spécifiée' }}</p>
                        <p class="text-gray-500 text-sm mt-1">Durée : {{ $offer->Duration_Offer ?? 'Non spécifiée' }}</p>
                        <p class="text-gray-500 text-sm mt-1">Catégorie : {{ $offer->category->Name_Category ?? 'Non spécifiée' }}</p>
                        <p class="text-gray-500 text-sm mt-1">Status : {{ $offer->status->Title_Status ?? 'Non spécifiée' }}</p>
                        <p class="text-gray-500 text-sm mt-1">Mail : {{ $offer->account->Email_Account ?? 'Non spécifiée' }}</p>
                        
                        <!-- Boutons pour afficher/cacher la description et postuler -->
                        <div class="flex space-x-2 mt-2">
                            <button onclick="toggleDescription(this)" class="flex-1 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Description +</button>
                            <a href="{{ route('applications.create', $offer->Id_Offer) }}" class="flex-1 text-center px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Postuler</a>
                        </div>
                        
                        <!-- Description cachée par défaut -->
                        <div class="description hidden mt-2 text-gray-600">
                            <p>{{ $offer->Description_Offer }}</p>
                        </div>

                        <div class="flex space-x-1 mt-2">
                            <!-- Bouton Modifier -->
                            <a href="{{ route('offers.edit', $offer->Id_Offer) }}" 
                               class="p-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                ✏
                            </a>
                        
                            <!-- Bouton Supprimer -->
                            <form action="{{ route('offers.destroy', $offer->Id_Offer) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette offre ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                    🗑
                                </button>
                            </form>
                        </div>
                                   
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@php
                    $account = session('account');

                    if ($account === null) {
                        dump('null');
                    } else {
                        $roleId = (int) $account->Id_Role;
                        dump($roleId);
                    }
                @endphp

<script>
    function toggleDescription(button) {
        const description = button.parentElement.nextElementSibling;
        if (description.classList.contains('hidden')) {
            description.classList.remove('hidden');
            button.textContent = "Description -";
        } else {
            description.classList.add('hidden');
            button.textContent = "Description +";
        }
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.wishlist-btn').forEach(button => {
            button.addEventListener('click', function() {
                let offerId = this.getAttribute('data-offer-id');
                let icon = this.querySelector('.wishlist-icon');
                let text = this.querySelector('.wishlist-text');
    
                fetch(`/wishlist/toggle/${offerId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'added') {
                        icon.innerText = "❤️";
                    } else if (data.status === 'removed') {
                        icon.innerText = "🤍";
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Erreur:', error));
            });
        });
    });
    </script>
    
    
@endsection
