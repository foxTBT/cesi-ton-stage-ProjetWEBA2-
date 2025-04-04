@extends('layouts.app')

@section('content')

<h1 class="my-4 text-center text-xl font-semibold text-gray-800 mb-4">Liste des Entreprises</h1>

<!-- Section contenant la barre de recherche et le bouton d'ajout -->
<div class="flex mx-auto w-fit p-3 gap-3">
    <!-- Inclusion de la barre de recherche -->
    @include('partials.search_bar')

    <!-- Si l'utilisateur connecté a un rôle supérieur à 1, affiche le bouton "Ajouter" pour créer une nouvelle entreprise -->
    @if (session('account') && session('account')->Id_Role > '1')
        <a href="{{ route('companies.create') }}">
            <button class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-green-500 hover:bg-green-300 hover:text-black">
                <strong>Ajouter</strong>
            </button>
        </a>
    @endif
</div>

<!-- Inclusion de la section pour afficher les messages d'état (erreur, succès, etc.) -->
@include('partials.state_message')

<!-- Grille pour afficher les entreprises -->
<div class="flex justify-center">
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 gap-4">
        <!-- Boucle pour afficher chaque entreprise -->
        @foreach ($companies as $company)
            <div class="bg-gray-100 shadow-lg rounded-lg p-6 border">
                
                <!-- Lien vers la page de détails de l'entreprise -->
                <a href="{{ route('companies.show', $company->Id_Company) }}" class="Block">
                    <!-- Section affichant les informations de base de l'entreprise -->
                    <div class="flex items-center space-x-4 border-2 border-yellow-500 bg-yellow-500 shadow-lg rounded-lg p-2 hover:border-black hover:bg-yellow-400">
                        
                        <!-- Affichage du logo de l'entreprise -->
                        <img src="{{ asset($company->Logo_link_Company) }}" alt="Logo de {{ $company->Name_Company }}" 
                            class="w-16 h-16 object-cover square-full">

                        <ul class="space-y-1">
                            <!-- Nom de l'entreprise -->
                            <li class="text-xl font-semibold text-gray-800"><strong>{{ $company->Name_Company }}</strong></li>
                            <!-- Affichage du numéro SIRET de l'entreprise -->
                            <li class="font-semibold text-gray-800"><strong>SIRET :</strong> {{ $company->Siret_number_Company }}</li>
                        </ul>
                    </div>
                </a>

                <!-- Informations détaillées sur l'entreprise -->
                <ul class="text-gray-600 space-y-1 mt-3">
                    <li><strong>Email :</strong> {{ $company->Email_Company }}</li>
                    <li><strong>Téléphone :</strong> {{ $company->Phone_number_Company }}</li>
                    <li><strong>Ville :</strong> {{ $company->city->Name_City }}</li>
                    <li><strong>Description :</strong> {{ $company->Description_Company }}</li>
                </ul>
            </div>
        @endforeach
    </div>
</div>

<!-- Affichage de la pagination pour naviguer entre les pages d'entreprises -->
<div>
    {{ $companies->appends(request()->input())->links('pagination::tailwind') }}
</div>

@endsection
