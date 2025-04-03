@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Analyse des Offres</h1>

    <h2>Répartition par Compétence (Top 5)</h2>
    <ul>
        @foreach($skillsDistribution as $skill)
            <li>
                Compétence: {{ $skills[$skill->Id_Skill]->Name_Skill ?? 'Inconnu' }} - Nombre d'offres: {{ $skill->total }}
            </li>
        @endforeach
    </ul>

    <h2>Durée des Offres</h2>
    <div>
        <a href="{{ route('offers.analytics', ['sort' => 'asc']) }}">Trier par Durée Croissante</a> |
        <a href="{{ route('offers.analytics', ['sort' => 'desc']) }}">Trier par Durée Décroissante</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID de l'Offre</th>
                <th>Titre de l'Offre</th>
                <th>Durée (jours)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($offersDuration as $offer)
                <tr>
                    <td>{{ $offer->Id_Offer }}</td>
                    <td>{{ $offer->Title_Offer }}</td>
                    <td>{{ $offer->duration }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Top des Offres Mises en Wish-List</h2>
    <ul>
        @foreach($topWishListedOffers as $offer)
            <li>Offre: {{ $offer->Title_Offer }} - Nombre de souhaits: {{ $offer->total }}</li>
        @endforeach
    </ul>
</div>
@endsection