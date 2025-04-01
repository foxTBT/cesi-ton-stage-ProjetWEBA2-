@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recherche de Stage</title>

    <!-- Lien vers Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">


    <!-- Hero Section -->
    <section class="bg-white text-center py-20">
        <h1 class="text-4xl font-bold text-gray-900">Trouvez votre stage idéal en quelques clics</h1>
        <p class="mt-4 text-lg text-gray-700">Explorez les meilleures opportunités de stage dans des entreprises de renom.</p>
        <a href="/offers" class="mt-6 inline-block bg-black text-white py-3 px-8 rounded-lg text-lg hover:bg-gray-800">Voir les offres de stage</a>
    </section>

    <!-- Section des entreprises partenaires -->
    <section class="bg-yellow-500 py-16 text-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl text-black font-semibold mb-8">Nos entreprises partenaires</h2>
            <div class="flex justify-center space-x-8">
                <img src="{{ asset('images/logo/talentis.png') }}" alt="Logo Talentis" class="mx-auto w-32 h-32 bg-yellow-500 rounded-full">
                <img src="{{ asset('images/logo/traverse_ta_rue.png') }}" alt="Logo Traverse Ta Rue" class="mx-auto w-32 h-32 bg-yellow-500 rounded-full">
                {{-- <div class="w-32 h-32 bg-gray-100 rounded-full"></div> --}}
            </div>
        </div>
    </section>

    
</body>

</html>
@endsection
