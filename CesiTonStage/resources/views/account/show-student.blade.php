@extends('layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>

<form action="{{ route('account.show-student') }}" class="flex mx-auto w-fit mt-3 mb-3">
    <input type="search" name="term" class="border border-black p-2 rounded-l-md focus:outline-none">
    <button type="submit" class="border border-black bg-yellow-500 text-black px-4 py-2 rounded-r-md -ml-px flex items-center justify-center">
        <img src="{{ asset('images/icon/searching.png') }}" alt="Chercher" class="w-6 h-6">
    </button>
</form>

@foreach ($students as $student)
    <div class="max-w-100 mx-auto bg-white shadow-lg rounded-lg p-6 border mb-4">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/icon/student-icon.png')}}" alt="Icon étudiant" 
                class="w-16 h-16 object-cover rounded-full border bg-yellow-500">

            <h3 class="text-xl font-semibold text-gray-800">
                {{ $student->First_name_Account }}
                {{ $student->Last_name_Account }}
            </h3>
        </div>

        <ul class="text-gray-600 space-y-1 mt-3">
            <li><strong>Email :</strong> {{ $student->Email_Account }}</li>
            
        </ul>
    </div>
@endforeach
@endsection