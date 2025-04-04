@extends('layouts.app')

@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg border p-6">

    <!-- Titre de la page de mise à jour -->
    <h2 class="bg-yellow-500 text-xl font-semibold pt-2 pl-12 pr-12 pb-2 mb-6 text-center rounded-lg shadow-lg">
        <strong>Mise à jour de l'entreprise</strong>
    </h2>

    <!-- Vérification des erreurs de validation -->
    @if ($errors->any())
        <!-- Affiche les erreurs si elles existent (ex. validation des champs) -->
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <!-- Affiche chaque erreur sous forme de liste -->
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire pour la mise à jour de l'entreprise -->
    <form action="{{ route('companies.update', $company->Id_Company) }}" method="POST">
        <!-- Token CSRF pour protéger contre les attaques de type CSRF -->
        @csrf
        <!-- Utilisation de la méthode PUT pour spécifier qu'il s'agit d'une mise à jour d'un enregistrement -->
        @method('PUT')

        <ul class="space-y-3">
            <!-- Champ pour le nom de l'entreprise -->
            <li>
                <label for="Name_Company" class="block text-gray-700"><strong>Nom :</strong></label>
                <!-- Pré-remplissage avec la valeur actuelle du nom de l'entreprise -->
                <input type="text" id="Name_Company" name="Name_Company" value="{{ $company->Name_Company }}"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Champ pour l'email de l'entreprise -->
            <li>
                <label for="Email_Company" class="block text-gray-700"><strong>Email :</strong></label>
                <!-- Pré-remplissage avec l'email actuel de l'entreprise -->
                <input type="text" id="Email_Company" name="Email_Company"
                    value="{{ $company->Email_Company }}"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Champ pour le numéro de téléphone de l'entreprise -->
            <li>
                <label for="Phone_number_Company" class="block text-gray-700"><strong>Téléphone :</strong></label>
                <!-- Pré-remplissage avec le numéro de téléphone actuel -->
                <input type="text" id="Phone_number_Company" name="Phone_number_Company"
                    value="{{ $company->Phone_number_Company }}"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Champ pour la description de l'entreprise -->
            <li>
                <label for="Description_Company" class="block text-gray-700"><strong>Description :</strong></label>
                <!-- Pré-remplissage avec la description actuelle -->
                <input type="text" id="Description_Company" name="Description_Company"
                    value="{{ $company->Description_Company }}"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Champ pour le numéro SIRET de l'entreprise -->
            <li>
                <label for="Siret_number_Company" class="block text-gray-700"><strong>SIRET :</strong></label>
                <!-- Pré-remplissage avec le numéro SIRET actuel -->
                <input type="text" id="Siret_number_Company" name="Siret_number_Company"
                    value="{{ $company->Siret_number_Company }}"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Champ pour le chemin du logo de l'entreprise -->
            <li>
                <label for="Logo_link_Company" class="block text-gray-700"><strong>Chemin Logo :</strong></label>
                <!-- Pré-remplissage avec le chemin actuel du logo -->
                <input type="text" id="Logo_link_Company" name="Logo_link_Company"
                    value="{{ $company->Logo_link_Company }}"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
            </li>

            <!-- Sélection de la ville de l'entreprise -->
            <li>
                <label for="Id_City" class="block text-gray-700"><strong>Ville :</strong></label>
                <!-- Liste déroulante pour choisir la ville de l'entreprise -->
                <select name="Id_City" id="Id_City"
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg hover:bg-yellow-50" required>
                    <!-- Boucle sur toutes les villes pour créer les options -->
                    @foreach ($cities as $city)
                        <option value="{{ $city->Id_City }}">
                            <!-- Si la ville est déjà sélectionnée, on la marque comme sélectionnée -->
                            {{ isset($company) && $company->Id_City == $city->Id_City ? 'selected' : '' }}>
                            {{ $city->Name_City }}
                        </option>
                    @endforeach
                </select>
            </li>

            <!-- Bouton de soumission du formulaire -->
            <li class="mx-auto w-fit">
                <button type="submit"
                    class="text-yellow-500 px-4 py-2 rounded border-2 border-yellow-500 hover:border-blue-500 hover:bg-blue-300 hover:text-black">
                    <strong>Mettre à jour</strong>
                </button>
            </li>
        </ul>
    </form>
</div>

@endsection
