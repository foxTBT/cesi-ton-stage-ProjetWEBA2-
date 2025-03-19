<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 border mt-4 mb-4">
    <div class="flex items-center space-x-4 bg-yellow-500 shadow-lg rounded-lg p-2">
        <img src="{{ $company->Logo_link_Company }}" alt="Logo de {{ $company->Name_Company }}" 
            class="w-16 h-16 object-cover rounded-full border">

        <ul class="space-y-1">
            <li class="mx-auto w-fit text-xl font-semibold text-gray-800"><strong>{{ $company->Name_Company }}</strong></li>
        </ul>
    </div>

    <ul class="text-gray-600 space-y-1 mt-3">
        <li><strong>SIRET :</strong> {{ $company->Siret_number_Company }}</li>
        <li><strong>Email :</strong> {{ $company->Email_Company }}</li>
        <li><strong>Téléphone :</strong> {{ $company->Phone_number_Company }}</li>
        <li><strong>Description :</strong> {{ $company->Description_Company }}</li>
    </ul>
</div>

@include('partials.evaluation')

<!-- Limiter Permissions -->
<div class="max-w-lg mx-auto flex flex-row items-center place-content-evenly bg-white shadow-lg rounded-lg p-4 border mt-4 mb-4">
    <a href="{{ route('companies.edit', $company->Id_Company) }}">
        <button class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-blue-500 hover:bg-blue-300 hover:text-black"><strong>Modifier</strong></button>
    </a>

    <form action="{{ route('companies.destroy', $company->Id_Company) }}" method="POST" class="flex items-center p-0 m-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-red-500 hover:bg-red-300 hover:text-black"><strong>Supprimer</strong></button>
    </form>
</div>
<!-- Limiter Permissions -->

@include('partials.search_bar_comp_offer')
