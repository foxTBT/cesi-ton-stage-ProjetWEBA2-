@extends('layouts.app')

@section('content')

<h1 class="my-4 text-center text-xl font-semibold text-gray-800 mb-4">Liste des Entrteprises</h1>

<div class="flex mx-auto w-fit p-3 gap-3">
    @include('partials.search_bar')

    @if (session('account') && session('account')->Id_Role > '1')
        <a href="{{ route('companies.create') }}">
            <button class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-green-500 hover:bg-green-300 hover:text-black">
                <strong>Ajouter</strong>
            </button>
        </a>
    @endif
</div>

@include('partials.state_message')

<div class="flex justify-center">
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 gap-4">
        @foreach ($companies as $company)
            <div class="bg-gray-100 shadow-lg rounded-lg p-6 border">
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
                    <li><strong>Ville :</strong> {{ $company->city->Name_City }}</li>
                    <li><strong>Description :</strong> {{ $company->Description_Company }}</li>
                </ul>
            </div>
        @endforeach
    </div>
</div>

<div>
    {{ $companies->appends(request()->input())->links('pagination::tailwind') }}
</div>

@endsection
