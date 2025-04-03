@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="my-4 text-center text-xl font-semibold text-gray-800 mb-4">Votre Wishlist</h1>

    <div class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @if($wishLists->isEmpty())
                <div class="col-span-1">
                    <div class="bg-white shadow-md rounded-lg p-4 text-center">
                        <p class="text-gray-600">Votre wishlist est vide. Ajoutez des offres pour les voir ici.</p>
                    </div>
                </div>
            @else
                @foreach($wishLists as $wishList)
                    <div class="bg-white shadow-md rounded-lg p-4 w-80">
                        <!-- Nom de l'entreprise -->
                        <div class="flex justify-between items-center border-b pb-2">
                            <strong class="text-lg">
                                <p>{{ $wishList->offer->company?->Name_Company ?? 'N/A' }}</p>
                            </strong>
                            <form action="{{ route('wishlist.remove', $wishList->Id_Offer) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment retirer cette offre de votre wishlist ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Retirer</button>
                            </form>
                        </div>
                        <!-- Détails de l'offre -->
                        <div class="mt-2">
                            <h5 class="text-xl font-semibold">{{ $wishList->offer->Title_Offer }}</h5>
                            <p class="text-gray-600">Salaire /an : {{ $wishList->offer->Salary_Offer }}</p>
                            <p class="text-gray-500 text-sm mt-1">Date de début : {{ $wishList->offer->Begin_date_Offer ?? 'Non spécifiée' }}</p>
                            <p class="text-gray-500 text-sm mt-1">Durée : {{ $wishList->offer->End_date_Offer ?? 'Non spécifiée' }}</p>
                            <p class="text-gray-500 text-sm mt-1">Catégorie : {{ $wishList->offer->category->Name_Category ?? 'Non spécifiée' }}</p>
                            <p class="text-gray-500 text-sm mt-1">Status : {{ $wishList->offer->status->Title_Status ?? 'Non spécifiée' }}</p>
                            <p class="text-gray-500 text-sm mt-1">Mail : {{ $wishList->offer->account->Email_Account ?? 'Non spécifiée' }}</p>
                            
                            <!-- Boutons pour afficher/cacher la description et postuler -->
                            <div class="flex space-x-2 mt-2">
                                <button onclick="toggleDescription(this)" class="flex-1 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Description +</button>
                                <a href="{{ route('applications.create', $wishList->offer->Id_Offer) }}" class="flex-1 text-center px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Postuler</a>
                            </div>

                            <!-- Description cachée par défaut -->
                            <div class="description hidden mt-2 text-gray-600">
                                <p>{{ $wishList->offer->Description_Offer }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

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

@endsection