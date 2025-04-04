@extends('layouts.app')

@section('content')
<<<<<<< HEAD

<div class="bg-gray-100 shadow-lg rounded-lg border p-6">

    <h2 class="shadow-lg rounded-lg bg-yellow-500 text-xl font-semibold pt-2 pl-12 pr-12 pb-2 mb-6 text-center">
        <strong>Créer une offre</strong>
    </h2>
=======
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8 border mt-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Créer une offre en tant que : {{ session('account')->First_name_Account }} {{ session('account')->Last_name_Account }}</h2>
>>>>>>> corrections

    <form action="{{ route('offers.store') }}" method="POST" class="space-y-6">
        @csrf

<<<<<<< HEAD
        <ul class="space-y-3">
            <li>
                <label for="Title_Offer" class="block text-gray-700"><strong>Titre de l'offre :</strong></label>
                <input type="string" name="Title_Offer" id="Title_Offer"
                class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Description_Offer" class="block text-gray-700"><strong>Description de l'offre</strong></label>
                <input type="string" name="Description_Offer" id="Description_Offer"
                class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Begin_date_Offer" class="block text-gray-700"><strong>Date de début de l'offre :</strong></label>
                <input type="date" name="Begin_date_Offer" id="Begin_date_Offer"
                class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="End_date_Offer" class="block text-gray-700"><strong>Date de fin de l'offre :</strong></label>
                <input type="date" name="End_date_Offer" id="End_date_Offer"
                class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Salary_Offer" class="block text-gray-700"><strong>Montant du salaire annuel :</strong></label>
                <input type="integer" name="Salary_Offer" id="Salary_Offer"
                class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Id_Category" class="block text-gray-700"><strong>Catégorie :</strong></label>
                <select name="Id_Category" id="Id_Category" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    <option value="1">Stage</option>
                    <option value="2">Alternance</option>
                </select>
            </li>

            <li>
                <label for="Id_Status" class="block text-gray-700"><strong>Status :</strong></label>
                <select name="Id_Status" id="Id_Status" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->Id_Status }}">{{ $status->Title_Status }}</option>                
                    @endforeach
                </select>
            </li>

            <li>
                <label for="Id_Account" class="block text-gray-700"><strong>Compte :</strong></label>
                <select name="Id_Account" id="Id_Account" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    @foreach ($accounts as $account)
                    <option value="{{ $account->Id_Account }}">{{ $account->First_name_Account }} {{ $account->Last_name_Account }}</option>
                    @endforeach
                </select>
            </li>

            <li>
                <label for="Id_Company" class="block text-gray-700"><strong>Entreprise :</strong></label>
                <select name="Id_Company" id="Id_Company" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    @foreach ($companies as $company)
                    <option value="{{ $company->Id_Company }}">{{ $company->Name_Company }}</option>
                    @endforeach
                </select>
            </li>

            <li>
                <label for="skills" class="block text-gray-700"><strong>Compétences :</strong></label>
                <select name="skills[]" id="skills" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" multiple required>
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->Id_Skill }}">{{ $skill->Name_Skill }}</option>
                    @endforeach
                </select>
            </li>

            <li class="mx-auto w-fit">
                <button type="submit" class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-green-500 hover:bg-green-300 hover:text-black">
                    <strong>Créer l'offre</strong>
                </button>
            </li>
=======
        <!-- Compte -->
        <label for="Id_Account" class="block text-lg font-medium text-gray-700 mb-2">Compte :</label>
        <input 
            type="hidden" 
            name="Id_Account" 
            id="Id_Account" 
            value="{{ session('account')->Id_Account }}"
        >

        <!-- Titre de l'offre -->
        <div class="mb-6">
            <label for="Title_Offer" class="block text-lg font-medium text-gray-700 mb-2">Titre de l'offre :</label>
            <input type="text" name="Title_Offer" id="Title_Offer" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition" required>
        </div>

        <!-- Description de l'offre -->
        <div class="mb-6">
            <label for="Description_Offer" class="block text-lg font-medium text-gray-700 mb-2">Description de l'offre :</label>
            <textarea name="Description_Offer" id="Description_Offer" rows="4" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition" required></textarea>
        </div>

        <!-- Date de début -->
        <div class="mb-6">
            <label for="Begin_date_Offer" class="block text-lg font-medium text-gray-700 mb-2">Date de début de l'offre :</label>
            <input type="date" name="Begin_date_Offer" id="Begin_date_Offer" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition" required>
        </div>

        <!-- Date de fin -->
        <div class="mb-6">
            <label for="End_date_Offer" class="block text-lg font-medium text-gray-700 mb-2">Date de fin de l'offre :</label>
            <input type="date" name="End_date_Offer" id="End_date_Offer" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition" required>
        </div>

        <!-- Montant du salaire -->
        <div class="mb-6">
            <label for="Salary_Offer" class="block text-lg font-medium text-gray-700 mb-2">Montant du salaire annuel :</label>
            <input type="number" name="Salary_Offer" id="Salary_Offer" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition" required>
        </div>

        <!-- Catégorie -->
        <div class="mb-6">
            <label for="Id_Category" class="block text-lg font-medium text-gray-700 mb-2">Catégorie :</label>
            <select name="Id_Category" id="Id_Category" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition" required>
                <option value="1">Stage</option>
                <option value="2">Alternance</option>
            </select>
        </div>

        <!-- Statut -->
        <div class="mb-6">
            <label for="Id_Status" class="block text-lg font-medium text-gray-700 mb-2">Statut :</label>
            <select name="Id_Status" id="Id_Status" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status->Id_Status }}">{{ $status->Title_Status }}</option>                
                @endforeach
            </select>
        </div>

        <!-- Entreprise -->
        <div class="mb-6">
            <label for="Id_Company" class="block text-lg font-medium text-gray-700 mb-2">Entreprise :</label>
            <select name="Id_Company" id="Id_Company" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->Id_Company }}">{{ $company->Name_Company }}</option>
                @endforeach
            </select>
        </div>

        <!-- Compétences -->
        <div class="mb-6 relative">
            <label class="block text-lg font-medium text-gray-700 mb-2">Compétences :</label>
            
            
                <!-- Liste des compétences -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
    @foreach ($skills as $skill)
        <div class="flex items-center space-x-2">
            <input 
                type="checkbox" 
                name="skills[]" 
                id="skill_{{ $skill->Id_Skill }}" 
                value="{{ $skill->Id_Skill }}" 
                class="h-5 w-5 border-gray-300 rounded focus:ring-2 focus:ring-yellow-500 transition"
            >
            <label for="skill_{{ $skill->Id_Skill }}" class="text-gray-700">
                {{ $skill->Name_Skill }}
            </label>
        </div>
    @endforeach
</div>

            
        </div>
        
        <!-- Bouton de soumission -->
        <div class="text-center">
            <button type="submit" class="bg-yellow-500 text-white font-semibold py-3 px-6 rounded shadow-lg hover:bg-yellow-400 transition duration-300">Créer l'offre</button>
        </div>
>>>>>>> corrections
    </form>
</div>


@endsection
