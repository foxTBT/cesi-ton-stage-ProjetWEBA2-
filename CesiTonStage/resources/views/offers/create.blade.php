@extends('layouts.app')

@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg border p-6">

    <h2 class="shadow-lg rounded-lg bg-yellow-500 text-xl font-semibold pt-2 pl-12 pr-12 pb-2 mb-6 text-center">
        <strong>Créer une offre en tant que : {{ session('account')->First_name_Account }} {{ session('account')->Last_name_Account }}</strong>
    </h2>

    <form action="{{ route('offers.store') }}" method="POST" class="space-y-6">
        @csrf

        <ul class="space-y-3">
            <label for="Id_Account" class="block text-lg font-medium text-gray-700 mb-2">Compte :</label>
            <input 
                type="hidden" 
                name="Id_Account" 
                id="Id_Account" 
                value="{{ session('account')->Id_Account }}"
            >

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

            <li class="hidden">
                <label for="Id_Status" class="block text-gray-700"><strong>Status :</strong></label>
                <select name="Id_Status" id="Id_Status" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->Id_Status }}">{{ $status->Title_Status }}</option>                
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

            <li class="mb-6 relative">
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
            </li>

            <li class="mx-auto w-fit">
                <button type="submit" class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-green-500 hover:bg-green-300 hover:text-black">
                    <strong>Créer l'offre</strong>
                </button>
            </li>
    </form>
</div>


@endsection
