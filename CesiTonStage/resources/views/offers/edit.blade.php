@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="my-4 text-center text-xl font-semibold text-gray-800 mb-4">Modifier l'Offre</h1>
    <form action="{{ route('offers.update', ['id' => $offer->Id_Offer]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="Title_Offer">Titre</label>
        <input type="text" name="Title_Offer" value="{{ $offer->Title_Offer }}" required class="border p-2 w-full">

        <label for="Description_Offer">Description</label>
        <textarea name="Description_Offer" required class="border p-2 w-full">{{ $offer->Description_Offer }}</textarea>

        <label for="Salary_Offer">Salaire</label>
        <input type="number" name="Salary_Offer" value="{{ $offer->Salary_Offer }}" class="border p-2 w-full">

        <label for="Begin_date_Offer">Date de début</label>
        <input type="date" name="Begin_date_Offer" value="{{ $offer->Begin_date_Offer }}" required class="border p-2 w-full">

        <label for="Duration_Offer">Durée</label>
        <input type="date" name="Duration_Offer" value="{{ $offer->Duration_Offer }}" class="border p-2 w-full">

        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Mettre à jour</button>
    </form>
</div>
@endsection
