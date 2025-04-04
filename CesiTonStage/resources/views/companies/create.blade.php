@extends('layouts.app')

@section('content')

<!-- Conteneur principal du formulaire avec une bordure et un ombrage -->
<div class="bg-gray-100 shadow-lg rounded-lg border p-6">

    <h2 class="bg-yellow-500 text-xl font-semibold py-2 px-12 mb-6 text-center rounded-lg shadow-lg">
        <strong>Création d'entreprise</strong>
    </h2>

    <!-- Formulaire d'envoi vers companies.store (route qui gère l'ajout d'une entreprise) -->
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf <!-- Protection CSRF pour éviter les attaques de type CSRF -->

        <ul class="space-y-3">
            <!-- Champ de saisie pour le nom de l'entreprise -->
            <li>
                <label for="Name_Company" class="block text-gray-700"><strong>Nom :</strong></label>
                <input value="{{ old('Name_Company') }}" type="text" id="Name_Company" name="Name_Company"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Champ de saisie pour l'email de l'entreprise -->
            <li>
                <label for="Email_Company" class="block text-gray-700"><strong>Email :</strong></label>
                <input value="{{ old('Email_Company') }}" type="text" id="Email_Company" name="Email_Company"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Champ de saisie pour le numéro de téléphone de l'entreprise -->
            <li>
                <label for="Phone_number_Company" class="block text-gray-700"><strong>Téléphone :</strong></label>
                <input value="{{ old('Phone_number_Company') }}" type="text" id="Phone_number_Company" name="Phone_number_Company"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Champ de saisie pour la description de l'entreprise -->
            <li>
                <label for="Description_Company" class="block text-gray-700"><strong>Description :</strong></label>
                <input value="{{ old('Description_Company') }}" type="text" id="Description_Company" name="Description_Company"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Champ de saisie pour le numéro SIRET de l'entreprise -->
            <li>
                <label for="Siret_number_Company" class="block text-gray-700"><strong>SIRET :</strong></label>
                <input value="{{ old('Siret_number_Company') }}" type="text" id="Siret_number_Company" name="Siret_number_Company"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Champ de saisie pour le lien du logo de l'entreprise -->
            <li>
                <label for="Logo_link_Company" class="block text-gray-700"><strong>Chemin Logo :</strong></label>
                <input type="text" id="Logo_link_Company" name="Logo_link_Company"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Liste déroulante pour sélectionner la ville de l'entreprise -->
            <li>
                <label for="Id_City" class="block text-gray-700"><strong>Ville :</strong></label>
                <select name="Id_City" id="Id_City"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
                    <!-- Boucle sur les villes disponibles pour les afficher dans le select -->
                    @foreach ($cities as $city)
                        <option value="{{ $city->Id_City }}">{{ $city->Name_City }}</option>
                    @endforeach
                </select>
            </li>

            <!-- Bouton pour soumettre le formulaire et créer l'entreprise -->
            <li class="mx-auto w-fit">
                <button type="submit"
                    class="text-yellow-500 px-4 py-2 rounded border-2 border-yellow-500 hover:border-green-500 hover:bg-green-300 hover:text-black">
                    <strong>Créer l'entreprise</strong>
                </button>
            </li>
        </ul>

        <!-- Affichage des erreurs de validation si elles existent -->
        @if ($errors->any())
            <div class="text-red-500 mt-4">
                <ul>
                    <!-- Boucle à travers toutes les erreurs de validation -->
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>

@endsection
