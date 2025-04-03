@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-gray-100 rounded-lg shadow-md mt-3">
    <h2 class="text-2xl font-bold mb-4">Politique de protection des données</h2>

    @if(session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <p class="mb-4">Vous pouvez voir et modifier vos préférences en matière de cookies ci-dessous :</p>

    <form action="{{ route('cookie.update') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="accept_cookies" value="true" class="mr-2" 
                    {{ $cookies['accept_cookies'] ? 'checked' : '' }}>
                Accepter le cookie qui dit que vous acceptez d'avoir des cookies
            </label>
        </div>

        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
            Enregistrer les préférences
        </button>
    </form>
</div>

@endsection
