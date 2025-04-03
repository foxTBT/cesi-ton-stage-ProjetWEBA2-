@extends('layouts.app')

@section('content')

<div class="flex mx-auto w-fit p-3 gap-6">
    <form action="{{ route('accounts.show-student') }}" class="flex">
        <input type="search" name="term" class="border-2 border-black p-2 rounded-l-md focus:outline-none hover:bg-yellow-50">
        <button type="submit" class="border-2 border-black bg-yellow-500 text-black px-4 py-2 rounded-r-md -ml-px flex items-center justify-center hover:bg-yellow-400">
            <img src="{{ asset('images/icon/searching.png') }}" alt="Chercher" class="w-6 h-6">
        </button>
    </form>

    <a href="{{ route('accounts.create') }}">
        <button class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-green-500 hover:bg-green-300 hover:text-black"><strong>Ajouter</strong></button>
    </a>
</div> 


@foreach ($students as $student)
    <div class="max-w-100 mx-auto bg-white shadow-lg rounded-lg p-6 border mb-4">
        <a href="{{ route('accounts.show-student-details',$student->Id_Account)}}">
            <div class="flex items-center space-x-4 border-2 border-yellow-500 bg-yellow-500 shadow-lg rounded-lg p-2 hover:border-black hover:bg-yellow-400">
                <img src="{{ asset('images/icon/student-icon.png')}}" alt="Icon étudiant" 
                    class="w-16 h-16 object-cover rounded-full border bg-yellow-300">

                <h3 class="text-xl font-semibold text-gray-800 hover:font-bold" >
                    {{ $student->First_name_Account }}
                    {{ $student->Last_name_Account }}
                </h3>
            </div>
        </a>
        <ul class="text-gray-600 space-y-1 mt-3">
            <li><strong>Email :</strong> {{ $student->Email_Account }}</li>
            
        </ul>
        @if (session('account') && session('account')->Id_Role > 1)
        <div class="flex flex-row place-content-evenly mt-4 font-bold">
            <!-- Bouton de mise à jour -->
            <a href="{{ route('accounts.edit', $student->Id_Account) }}" class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:bg-yellow-300 hover:text-black">Modifier</a>
            <!-- Bouton de suppression -->
            <form action="{{ route('accounts.destroy', $student->Id_Account) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="source" value="show-student">
                <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-300">Supprimer</button>
            </form>
        </div>
        @endif
    </div>
@endforeach

<!-- Popup de succès -->
<div id="successPopup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden ">
    <div class="bg-white rounded-lg p-6 shadow-lg max-w-sm w-full border-black border-2">
        <h2 class="text-3 font-semibold text-gray-800 mb-4">Succès</h2>
        <p id="successMessage" class="text-gray-600"></p>
        <button onclick="closePopup()" class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded">OK</button>
    </div>
</div>

{{-- En commun avec show-show.blade.php A METTRE DANS LE SCRIPT.JS --}}
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
    {{ $students->appends(request()->input())->links('pagination::tailwind') }}
</div>

@endsection