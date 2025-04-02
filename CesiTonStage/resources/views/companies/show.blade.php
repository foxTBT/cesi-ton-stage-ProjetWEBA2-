@extends('layouts.app')

@section('content')

<div class="bg-yellow-500 shadow-lg rounded-lg p-6 border mt-4 mb-4">
    @include('partials.evaluation', $company)

    <div class="bg-white shadow-lg rounded-lg p-6 border mt-4 mb-4">
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
            <li><strong>Ville :</strong> {{ $company->city->Name_City }}</li>
            <li><strong>Description :</strong> {{ $company->Description_Company }}</li>
        </ul>
    </div>

    @if (session('account') && session('account')->Id_Role > '2')
        <div class="flex flex-row items-center place-content-evenly bg-white shadow-lg rounded-lg p-4 border mt-4 mb-4">
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

@include('partials.search_bar_comp_offer')
@endsection
