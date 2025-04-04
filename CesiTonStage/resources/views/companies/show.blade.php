@extends('layouts.app')

@section('content')

<div class="bg-yellow-500 shadow-lg rounded-lg p-4 border mb-4">
    <div class="flex flex-row items-center place-content-evenly">
        @include('partials.evaluation', $company)
        
        @include('partials.dashboard', $company)
    </div>

    <div class="bg-gray-100 shadow-lg rounded-lg p-6 border mt-4 mb-4">
        <div class="flex items-center space-x-4 bg-yellow-500 shadow-lg rounded-lg p-2">
            <img src="{{ $company->Logo_link_Company }}" alt="Logo de {{ $company->Name_Company }}" class="w-16 h-16 object-cover rounded-full border">

            <ul class="space-y-1">
                <li class="text-xl font-semibold text-gray-800"><strong>{{ $company->Name_Company }}</strong></li>
        
                @if(isset($averageRating))
                    <div>Note de l'entreprise : <strong>{{ number_format($averageRating, 1) }} ⭐</strong></div>
                @else
                    <div>Aucune évaluation réalisée...</div>
                @endif
            </ul>
        </div>

        <ul class="text-gray-600 space-y-1 mt-3">
            <li><strong>SIRET :</strong> {{ $company->Siret_number_Company }}</li>
            <li><strong>Email :</strong> {{ $company->Email_Company }}</li>
            <li><strong>Téléphone :</strong> {{ $company->Phone_number_Company }}</li>
            <li><strong>Ville :</strong> {{ $company->city->Name_City }}</li>
            <li><strong>Description :</strong> {{ $company->Description_Company }}</li>
        </ul>
    </div>

    @if (session('account') && session('account')->Id_Role > '1')
        <div class="flex flex-row items-center place-content-evenly bg-gray-100 shadow-lg rounded-lg p-4 border mt-4 mb-4">
            <a href="{{ route('companies.edit', $company->Id_Company) }}">
                <button class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-blue-500 hover:bg-blue-300 hover:text-black"><strong>Mettre à jour</strong></button>
            </a>

            <form action="{{ route('companies.destroy', $company->Id_Company) }}" method="POST" class="flex items-center p-0 m-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-red-500 hover:bg-red-300 hover:text-black"><strong>Supprimer</strong></button>
            </form>
        </div>
    @endif

    @include('partials.state_message')
</div>

<div class="bg-yellow-500 shadow-lg rounded-lg p-4 border mb-4">
    <div class="bg-white shadow-lg rounded-lg p-6 border">

        <h2 class="mx-auto w-fit text-xl font-semibold text-gray-800">Rechercher une de nos offres ?</h2>

        @include('partials.search_bar_comp_offer')

        <div class="flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                @isset($offers)
                @foreach($offers as $offer)
                    <div class="bg-gray-100 shadow-lg rounded-lg p-7 border">
                            
                        @if (session('account') && session('account')->Id_Role !== 2) 
                            <form action="{{ route('wishlist.add', $offer->Id_Offer) }}" method="POST">
                                @csrf
                                <button type="submit" class="flex ml-auto w-fit font-bold text-zinc-500 hover:text-yellow-500 pb-1">Ajouter à la wishlist</button>
                            </form>
                        @endif

                        <div class="flex items-center border-b pb-2">
                            <strong class="text-lg">
                                <p>{{ $offer->company?->Name_Company ?? 'N/A' }}</p>
                            </strong>
                            @php
                                $account = session('account');
                            @endphp
                        </div>
                        <!-- Détails de l'offre -->
                        <div class="mt-2">
                            <h5 class="text-xl font-semibold">{{ $offer->Title_Offer }}</h5>
                            <p class="text-gray-600">Salaire /an : {{ $offer->Salary_Offer }}</p>
                            <p class="text-gray-500 text-sm mt-1">Date de début : {{ $offer->Begin_date_Offer ?? 'Non spécifiée' }}</p>
                            <p class="text-gray-500 text-sm mt-1">Date de fin : {{ $offer->End_date_Offer ?? 'Non spécifiée' }}</p>
                            <p class="text-gray-500 text-sm mt-1">Catégorie : {{ $offer->category->Name_Category ?? 'Non spécifiée' }}</p>
                            <p class="text-gray-500 text-sm mt-1">Status : {{ $offer->status->Title_Status ?? 'Non spécifiée' }}</p>
                            <p class="text-gray-500 text-sm mt-1">Mail : {{ $offer->account->Email_Account ?? 'Non spécifiée' }}</p>
                            
                            <div class="mt-2">
                                <strong>Compétences :</strong>
                                <ul class="list-disc list-inside text-gray-500 text-sm">
                                    @if($offer->skills->isEmpty())
                                        <li>Aucune compétence spécifiée</li>
                                    @else
                                        @foreach($offer->skills as $skill)
                                            <li>{{ $skill->Name_Skill }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>

                            <div class="flex gap-2 mt-2">
                                <button onclick="toggleDescription(this)" class="flex-1 px-3 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-400">
                                    <strong>Description+</strong>
                                </button>
                                <a href="{{ route('applications.create', $offer->Id_Offer) }}" class="flex-1 text-center px-2 py-2 bg-yellow-500 text-black rounded hover:bg-green-400">
                                    <strong>Postuler</strong>
                                </a>
                            </div>
                            
                            <div class="description hidden mt-2 text-gray-600">
                                <p>{{ $offer->Description_Offer }}</p>
                            </div>

                            @if (session('account') && session('account')->Id_Role > 1)
                                <div class="flex space-x-1 mt-2">
                                    <a href="{{ route('offers.edit', $offer->Id_Offer) }}" 
                                    class="p-2 bg-blue-500 rounded hover:bg-blue-400 text-sm">
                                        ✏
                                    </a>
                                
                                    <form action="{{ route('offers.destroy', $offer->Id_Offer) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette offre ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-500 rounded hover:bg-red-400 text-sm">
                                            🗑
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Si un message d'erreur existe dans la session, on affiche une popup alert --}}
        @if (session('error'))
            <script type="text/javascript">
                alert("{{ session('error') }}");
            </script>
        @endif

        <script>
            function toggleDescription(button) {
                const description = button.parentElement.nextElementSibling;
                if (description.classList.contains('hidden')) {
                    description.classList.remove('hidden');
                    button.innerHTML = "<strong>Description-</strong>";
                } else {
                    description.classList.add('hidden');
                    button.innerHTML = "<strong>Description+</strong>";
                }
            }
        </script>
        
        <div class="mt-4">
            {{ $offers->appends(request()->input())->links('pagination::tailwind') }}
        </div>
    </div>
</div>

@else
    <p class="flex mx-auto w-fit">Aucune offre disponible.</p>
@endisset

@endsection
