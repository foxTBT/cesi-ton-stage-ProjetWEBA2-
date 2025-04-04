@extends('layouts.app')

@section('content')

<div class="bg-yellow-500 shadow-lg rounded-lg p-4 border mb-4">
    
    <!-- Vérifie si l'utilisateur connecté a un rôle plus élevé que 0 (pour voir les évaluations) -->
    @if (session('account') && session('account')->Id_Role > '0')
        <!-- Si oui, affiche la section des évaluations de l'entreprise -->
        <div class="flex flex-row items-center place-content-evenly">
            @include('partials.evaluation', $company)
        </div>
    @endif

    <!-- Section principale affichant les informations de l'entreprise -->
    <div class="bg-gray-100 shadow-lg rounded-lg p-6 border mt-4 mb-4">
        
        <!-- Affichage de l'image du logo de l'entreprise et de ses informations de base -->
        <div class="flex items-center space-x-4 bg-yellow-500 shadow-lg rounded-lg p-2">
            <img src="{{ asset($company->Logo_link_Company) }}" alt="Logo de {{ $company->Name_Company }}" class="w-16 h-16 object-cover square-full">

            <ul class="space-y-1">
                <!-- Nom de l'entreprise -->
                <li class="text-xl font-semibold text-gray-800"><strong>{{ $company->Name_Company }}</strong></li>
        
                <!-- Affichage de la note de l'entreprise s'il existe une évaluation -->
                @if(isset($averageRating))
                    <div>Note de l'entreprise : <strong>{{ number_format($averageRating, 1) }} ⭐</strong></div>
                @else
                    <div>Aucune évaluation réalisée...</div>
                @endif
            </ul>
        </div>

        <!-- Affichage des informations détaillées sur l'entreprise -->
        <ul class="text-gray-600 space-y-1 mt-3">
            <li><strong>SIRET :</strong> {{ $company->Siret_number_Company }}</li>
            <li><strong>Email :</strong> {{ $company->Email_Company }}</li>
            <li><strong>Téléphone :</strong> {{ $company->Phone_number_Company }}</li>
            <li><strong>Ville :</strong> {{ $company->city->Name_City }}</li>
            <li><strong>Description :</strong> {{ $company->Description_Company }}</li>
        </ul>
    </div>

    <!-- Vérification du rôle de l'utilisateur pour autoriser la mise à jour ou suppression de l'entreprise -->
    @if (session('account') && session('account')->Id_Role > '1')
        <!-- Si l'utilisateur a un rôle plus élevé que 1, il peut mettre à jour ou supprimer l'entreprise -->
        <div class="flex flex-row items-center place-content-evenly bg-gray-100 shadow-lg rounded-lg p-4 border mt-4 mb-4">
            
            <!-- Lien pour accéder à la page de mise à jour de l'entreprise -->
            <a href="{{ route('companies.edit', $company->Id_Company) }}">
                <button class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-blue-500 hover:bg-blue-300 hover:text-black">
                    <strong>Mettre à jour</strong>
                </button>
            </a>

            <!-- Formulaire pour supprimer l'entreprise -->
            <form action="{{ route('companies.destroy', $company->Id_Company) }}" method="POST" class="flex items-center p-0 m-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-red-500 hover:bg-red-300 hover:text-black">
                    <strong>Supprimer</strong>
                </button>
            </form>
        </div>
    @endif

    <!-- Inclusion de la partie "state_message" pour afficher des messages comme des erreurs ou des confirmations -->
    @include('partials.state_message')
</div>

<!-- Section pour afficher les offres d'emploi de l'entreprise -->
<div class="bg-yellow-500 shadow-lg rounded-lg p-4 border mb-4">
    <div class="bg-white shadow-lg rounded-lg p-6 border">

        <!-- Titre invitant les utilisateurs à postuler à une offre -->
        <h2 class="mx-auto w-fit text-xl font-semibold text-gray-800 mb-4">Vous voulez postuler une de nos offres ?</h2>

        <!-- Grille pour afficher les différentes offres d'emploi -->
        <div class="flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4">

                <!-- Vérification si l'entreprise a des offres disponibles -->
                @if($company->offers->isNotEmpty())
                    <!-- Si des offres existent, on les affiche une par une -->
                    @foreach($company->offers as $offer)
                    <div class="bg-gray-100 shadow-lg rounded-lg p-7 border">

                        <!--Vérification du rôle de l'utilisateur afin de lui donner le droit d'ajouter des offres à sa wishlist ou non-->
                        @if (session('account') && session('account')->Id_Role !== 2) 

                            <!-- Vérification si l'utilisateur a déjà postulé et affichage du bouton pour postuler -->
                            @if ($offer->hasWished)
                                <div class="flex-1 text-center px-2 py-2 mb-4 bg-gray-300 text-black rounded">
                                    
                                    <strong>Mis en WishList</strong>
                                    
                                </div>
                            @else
                                <form action="{{ route('wishlist.add', $offer->Id_Offer) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex-1 text-center px-2 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-400">
                                        <strong>Ajouter à la wishlist</strong>
                                    </button>
                                </form>
                            @endif

                        @endif

                        <!-- Affichage du nom de l'entreprise -->
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
                            
                            <!-- Affichage des compétences -->
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

                            <!--Affichage de la description de l'offre-->
                            <div class="flex gap-2 mt-2">
                                <button onclick="toggleDescription(this)" class="flex-1 px-3 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-400">
                                    <strong>Description+</strong>
                                </button>
                            
                                <!-- Vérification si l'utilisateur a déjà postulé et affichage du bouton pour postuler -->
                                @if ($offer->hasApplied)
                                    <span class="flex-1 text-center px-2 py-2 bg-gray-300 text-black rounded">
                                        <strong>Postulé</strong>
                                    </span>
                                @else
                                    <a href="{{ route('applications.create', $offer->Id_Offer) }}" 
                                    class="flex-1 text-center px-2 py-2 bg-yellow-500 text-black rounded hover:bg-green-400"
                                    id="apply-button-{{ $offer->Id_Offer }}"
                                    onclick="hideButtonAfterApply(this)">
                                    <strong>Postuler</strong>
                                    </a>
                                @endif
                            </div>
                            
                            <div class="description hidden mt-2 text-gray-600">
                                <p>{{ $offer->Description_Offer }}</p>
                            </div>
                            <!-- Affichage du bouton de suppression et d'édition pour les admin et les pilotes-->
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
                @endif
            </div>
        </div>

        <!-- Si un message d'erreur est présent dans la session, affiche une popup d'alerte -->
        @if (session('error'))
            <script type="text/javascript">
                alert("{{ session('error') }}");
            </script>
        @endif
    </div>
</div>

<!-- Lien vers un fichier JavaScript externe contenant la logique de la page (ex: pour afficher et fermer la description) -->
<script src="{{ asset('js/script.js') }}"></script>

@endsection
