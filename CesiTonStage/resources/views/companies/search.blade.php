@extends('layouts.app')

@section('content')
<div class="flex mx-auto w-fit p-3 gap-3">
    @include('partials.search_bar')

    <a href="{{ route('companies.create') }}">
        <button class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-green-500 hover:bg-green-300 hover:text-black"><strong>Ajouter</strong></button>
    </a>
</div>

@foreach ($companies as $company)
    <div class="bg-white shadow-lg rounded-lg p-6 border mb-4">
        <a href="{{ route('companies.show', $company->Id_Company) }}" class="Block">
            <div class="flex items-center space-x-4 border-2 border-yellow-500 bg-yellow-500 shadow-lg rounded-lg p-2 hover:border-black hover:bg-yellow-400">
                <img src="{{ $company->Logo_link_Company }}" alt="Logo de {{ $company->Name_Company }}" 
                    class="w-16 h-16 object-cover rounded-full border">

                <ul class="space-y-1">
                    <li class="text-xl font-semibold text-gray-800"><strong>{{ $company->Name_Company }}</strong></li>
                    <li class="font-semibold text-gray-800"><strong>SIRET :</strong> {{ $company->Siret_number_Company }}</li>
                </ul>
            </div>
        </a>

        <ul class="text-gray-600 space-y-1 mt-3">
            <li><strong>Email :</strong> {{ $company->Email_Company }}</li>
            <li><strong>Téléphone :</strong> {{ $company->Phone_number_Company }}</li>
            <li><strong>Description :</strong> {{ $company->Description_Company }}</li>
        </ul>
    </div>
@endforeach

<div class="mt-6 mb-4">
    {{ $companies->appends(request()->input())->links('pagination::tailwind') }}
</div>
@endsection
