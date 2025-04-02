@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-center text-xl font-semibold text-gray-800 mb-4">Postuler à l'Offre</h1>

    @if(session('error'))
        <div class="bg-red-500 text-white p-3 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('applications.store', ['offerId' => $offerId]) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf

        <input type="hidden" name="offer_id" value="{{ $offerId }}">

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Télécharger votre CV (PDF, DOC, DOCX) :</label>
            <input type="file" name="cv" required class="mt-2 block w-full p-2 border rounded">
            @error('cv')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Lettre de motivation (facultatif) :</label>
            <textarea name="cover_letter" rows="4" class="mt-2 block w-full p-2 border rounded"></textarea>
            @error('cover_letter')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition">
            Envoyer la candidature
        </button>
    </form>
</div>
@endsection
