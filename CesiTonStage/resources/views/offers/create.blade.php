@extends('layouts.app')

@section('content')
<div class="max-w-100 mx-auto bg-white shadow-lg rounded-lg p-6 border mt-4">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Créer une offre</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('offers.store') }}" method="POST" class="flex flex-col justify-center">
        @csrf

        <div class="mb-4">
            <label for="Title_Offer" class="block text-gray-700">Titre de l'offre :</label>
            <input type="string" name="Title_Offer" id="Title_Offer" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="Description_Offer" class="block text-gray-700">Description de l'offre</label>
            <input type="string" name="Description_Offer" id="Description_Offer" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="Begin_date_Offer" class="block text-gray-700">Date de début de l'offre :</label>
            <input type="date" name="Begin_date_Offer" id="Begin_date_Offer" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="Duration_Offer" class="block text-gray-700">Durée de l'offre :</label>
            <input type="date" name="Duration_Offer" id="Duration_Offer" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="Salary_Offer" class="block text-gray-700">Montant du salaire</label>
            <input type="integer" name="Salary_Offer" id="Salary_Offer" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="Id_Region" class="block text-gray-700">Région :</label>
            <select name="Id_Region" id="Id_Region" class="w-full px-4 py-2 border rounded-lg" required>
                <option></option>
                <option value="1">AUVERGNE-RHONE-ALPES</option>
                <option value="2">BOURGOGNE-FRANCHE-COMTE</option>
                <option value="3">BRETAGNE</option>
                <option value="4">CENTRE-VAL_DE_LOIRE</option>
                <option value="5">CORSE</option>
                <option value="6">GRAND_EST</option>
                <option value="7">HAUTS-DE-FRANCE</option>
                <option value="8">ILE-DE-FRANCE</option>
                <option value="9">NORMANDIE</option>
                <option value="10">NOUVELLE-AQUITAINE</option>
                <option value="11">OCCITANIE</option>
                <option value="12">PAYS_DE_LA_LOIRE</option>
                <option value="13">PROVENCE_ALPES_COTE_D_AZUR</option>
            </select>
        </div>

        <label for="Id_Region" class="block text-gray-700">Région :</label>
        <select name="Id_Region" id="Id_Region" class="w-full px-4 py-2 border rounded-lg" required>
            <option></option>
            <option value="1">LYON</option>
            <option value="2">GRENOBLE</option>
            <option value="3">SAINT-ETIENNE</option>

            <option value="4">DIJON</option>
            <option value="5">BESANCON</option>
            <option value="6">CHALON-SUR-SAONE</option>

            <option value="7">RENNES</option>
            <option value="8">BREST</option>
            <option value="9">QUIMPER</option>

            <option value="10">TOURS</option>
            <option value="11">ORLEANS</option>
            <option value="12">BOURGES</option>

            <option value="13">PROVENCE_ALPES_COTE_D_AZUR</option>
            <option value="14">AUVERGNE-RHONE-ALPES</option>
            <option value="15">BOURGOGNE-FRANCHE-COMTE</option>

            <option value="16">BRETAGNE</option>
            <option value="17">CENTRE-VAL_DE_LOIRE</option>
            <option value="18">CORSE</option>

            <option value="19">GRAND_EST</option>
            <option value="20">HAUTS-DE-FRANCE</option>
            <option value="21">ILE-DE-FRANCE</option>

            <option value="22">NORMANDIE</option>
            <option value="23">NOUVELLE-AQUITAINE</option>
            <option value="24">OCCITANIE</option>

            <option value="25">PAYS_DE_LA_LOIRE</option>
            <option value="26">PROVENCE_ALPES_COTE_D_AZUR</option>
            <option value="27">OCCITANIE</option>

            <option value="28">PAYS_DE_LA_LOIRE</option>
            <option value="29">PROVENCE_ALPES_COTE_D_AZUR</option>
            <option value="30">PROVENCE_ALPES_COTE_D_AZUR</option>

            <option value="31">PROVENCE_ALPES_COTE_D_AZUR</option>
            <option value="32">PROVENCE_ALPES_COTE_D_AZUR</option>
            <option value="33">PAYS_DE_LA_LOIRE</option>

            <option value="34">PROVENCE_ALPES_COTE_D_AZUR</option>
            <option value="35">PROVENCE_ALPES_COTE_D_AZUR</option>
            <option value="36">PAYS_DE_LA_LOIRE</option>

            <option value="37">PROVENCE_ALPES_COTE_D_AZUR</option>
            <option value="38">PROVENCE_ALPES_COTE_D_AZUR</option>
            <option value="39">PAYS_DE_LA_LOIRE</option>
        </select>
    </div>

        <button type="submit" class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:bg-yellow-300 hover:text-black">Créer l'offre</button>
    </form>
</div>
@endsection