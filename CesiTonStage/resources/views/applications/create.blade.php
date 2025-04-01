@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-center text-xl font-semibold text-gray-800 mb-4">Postuler à l'Offre</h1>
    
    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf

        <input type="hidden" name="offer_id" value="{{ $offerId }}">

        <div class="mb-4">
            <label class="block text-gray-700">Télécharger votre CV (PDF uniquement) :</label>
            <input type="file" name="cv" required class="mt-2 block w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Lettre de motivation (facultatif) :</label>
            <textarea name="cover_letter" rows="4" class="mt-2 block w-full p-2 border rounded"></textarea>
        </div>

        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
            Envoyer la candidature
        </button>
    </form>
</div>
@endsection
