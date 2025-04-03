@extends('layouts.app')

@section('content')

<div class="flex mx-auto w-fit p-3 gap-3">
    <form action="{{ route('accounts.show-pilote') }}" class="flex">
        <input type="search" name="term" class="border-2 border-black p-2 rounded-l-md focus:outline-none hover:bg-yellow-50">
        <button type="submit" class="border-2 border-black bg-yellow-500 text-black px-4 py-2 rounded-r-md -ml-px flex items-center justify-center hover:bg-yellow-400">
            <img src="{{ asset('images/icon/searching.png') }}" alt="Chercher" class="w-6 h-6">
        </button>
    </form>

    <a href="{{ route('accounts.create') }}">
        <button class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-green-500 hover:bg-green-300 hover:text-black"><strong>Ajouter</strong></button>
    </a>
</div> 

@foreach ($pilotes as $pilote)
    <div class="max-w-100 mx-auto bg-gray-100 shadow-lg rounded-lg p-6 border mb-4">
        <div class="flex items-center space-x-4 border-2 border-yellow-500 bg-yellow-500 shadow-lg rounded-lg p-2">
            <img src="{{ asset('images/icon/pilote-icon.png')}}" alt="Icon pilote" 
                class="w-16 h-16 object-cover square-full">

            <h3 class="text-xl font-semibold text-gray-800">
                {{ $pilote->First_name_Account }}
                {{ $pilote->Last_name_Account }}
            </h3>
        </div>

        <ul class="text-gray-600 space-y-1 mt-3">
            <li><strong>Email :</strong> {{ $pilote->Email_Account }}</li>
        </ul>

        @if (session('account') && session('account')->Id_Role > 1)
        <div class="flex flex-row place-content-evenly mt-4 font-bold">
            <!-- Bouton de mise à jour -->
            <a href="{{ route('accounts.edit', $pilote->Id_Account) }}" class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-blue-500 hover:bg-blue-300 hover:text-black">Mettre à jour</a>
            <!-- Bouton de suppression -->
            <form action="{{ route('accounts.destroy', $pilote->Id_Account) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="source" value="show-student">
                <button type="submit" class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-red-500 hover:bg-red-300 hover:text-black">Supprimer</button>
            </form>
        </div>
        @endif
    </div>
@endforeach

<!-- Popup de succès -->
<div id="successPopup" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden ">
    <div class="bg-white rounded-lg p-6 shadow-lg max-w-sm w-full border-black border-2">
        <h2 class="text-3 font-semibold text-gray-800 mb-4">Succès</h2>
        <p id="successMessage" class="text-gray-600"></p>
        <button onclick="closePopup()" class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded">OK</button>
    </div>
</div>

{{-- En commun avec show-student.blade.php A METTRE DANS LE SCRIPT.JS --}}
<script>
    function showPopup(surname, lastname) {
        document.getElementById('successMessage').innerText = `Le compte de ${surname} ${lastname} est supprimé avec succès !`;
        document.getElementById('successPopup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('successPopup').classList.add('hidden');
    }
</script>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showPopup('{{ session('success')['surname'] }}', '{{ session('success')['lastname'] }}');
        });
    </script>
@endif

{{-- Si un message d'erreur existe dans la session, on affiche une popup alert --}}
@if (session('error'))
    <script type="text/javascript">
        alert("{{ session('error') }}");
    </script>
@endif

<div>
    {{ $pilotes->appends(request()->input())->links('pagination::tailwind') }}
</div>

@endsection