@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-lg rounded-lg mt-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Analyse des Offres</h1>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Répartition par Compétence (Top 5)</h2>
        <ul class="list-disc pl-5">
            @foreach($skillsDistribution as $skill)
                <li class="text-gray-600">
                    Compétence: <strong>{{ $skills[$skill->Id_Skill]->Name_Skill ?? 'Inconnu' }}</strong> - Nombre d'offres: <strong>{{ $skill->total }}</strong>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Durée des Offres</h2>
        <div class="mb-4">
            <a href="{{ route('offers.analytics', ['sort' => 'asc']) }}" class="text-blue-500 hover:underline">Trier par Durée Croissante</a> |
            <a href="{{ route('offers.analytics', ['sort' => 'desc']) }}" class="text-blue-500 hover:underline">Trier par Durée Décroissante</a>
        </div>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border-b">ID de l'Offre</th>
                    <th class="py-2 px-4 border-b">Titre de l'Offre</th>
                    <th class="py-2 px-4 border-b">Durée (jours)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offersDuration as $offer)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $offer->Id_Offer }}</td>
                        <td class="py-2 px-4 border-b">{{ $offer->Title_Offer }}</td>
                        <td class="py-2 px-4 border-b">{{ $offer->duration }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Top des Offres Mises en Wish-List</h2>
        <ul class="list-disc pl-5">
            @foreach($topWishListedOffers as $offer)
                <li class="text-gray-600">
                    Offre: <strong>{{ $offer->Title_Offer }}</strong> - Nombre de souhaits: <strong>{{ $offer->total }}</strong>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection