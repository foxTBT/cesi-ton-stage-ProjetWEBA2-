@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-xl font-bold mb-4">Votre Wishlist</h1>
    
    @if($wishLists->isEmpty())
        <p>Aucune offre dans votre wishlist.</p>
    @else
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">Offre</th>
                    <th class="px-4 py-2 border-b">Nombre de personnes</th>
                    <th class="px-4 py-2 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wishLists as $wishList)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $wishList->offer->Title_Offer }}</td>
                        <td class="px-4 py-2 border-b">
                            {{ $wishCountMap[$wishList->offer->Id_Offer] ?? 0 }} <!-- Affiche le nombre de personnes ayant ajouté cette offre à leur wishlist -->
                        </td>
                        <td class="px-4 py-2 border-b">
                            <form action="{{ route('wishlist.remove', $wishList->offer->Id_Offer) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-red-500">Retirer de la wishlist</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection