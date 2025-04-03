@extends('layouts.app')

<html class="bg-yellow-500 text-gray-800">
@section('content')

<!-- Hero Section -->
<section class="text-center py-20">
    <h1 class="text-3xl font-bold">Trouvez votre stage idéal en quelques clics !</h1>
    <p class="mt-4 text-lg text-gray-600">Explorez les meilleures opportunités de stage dans des entreprises de renom.</p>
    <a href="/offers" class="mt-6 inline-block border-2 border-gray-800 bg-gray-800 text-gray-100 py-3 px-8 rounded-lg text-lg hover:bg-gray-100 hover:text-gray-800"><strong>Les offres de stage</strong></a>
</section>

<!-- Section des entreprises partenaires -->
<section class="shadow-lg rounded-lg bg-gray-100 p-[8%]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-8">Nos entreprises partenaires</h2>
        <div class="flex justify-center">
            <img src="{{ asset('images/logo/talentis.png') }}" alt="Logo Talentis" class="mx-auto w-20 h-20 rounded-full hover:opacity-60">
            <img src="{{ asset('images/logo/traverse_ta_rue.png') }}" alt="Logo Traverse Ta Rue" class="mx-auto w-20 h-20 bg-gray-800 rounded-full hover:opacity-60">
            <img src="{{ asset('images/logo/stage_finder.png') }}" alt="Logo Stage Finder" class="mx-auto w-20 h-20 bg-gray-300 rounded-full hover:opacity-60">
        </div>
    </div>
</section>

{{-- Si un message d'erreur existe dans la session, on affiche une popup alert --}}
@if (session('error'))
    <script type="text/javascript">
        alert("{{ session('error') }}");
    </script>
@endif

</html>
@endsection

</html>