@extends('layouts.app')

@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg border p-6">
    <h2 class="shadow-lg rounded-lg bg-yellow-500 text-xl font-semibold pt-2 pl-12 pr-12 pb-2 mb-6 text-center">
        <strong>Mettre à jour le compte</strong>
    </h2>

    @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
    <form action="{{ route('accounts.update', $account->Id_Account) }}" method="POST" class="flex flex-col justify-center">
        @csrf
        @method('PUT')

        <ul class="space-y-3">
            <li>
                <label for="Email_Account" class="block text-gray-700"><strong>Email :</strong></label>
                <input type="email" name="Email_Account" id="Email_Account" value="{{ $account->Email_Account }}" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50">
            </li>

            <li>
                <label for="First_name_Account" class="block text-gray-700"><strong>Prénom :</strong></label>
                <input type="text" name="First_name_Account" id="First_name_Account" value="{{ $account->First_name_Account }}" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50">
            </li>

            <li>
                <label for="Last_name_Account" class="block text-gray-700"><strong>Nom :</strong></label>
                <input type="text" name="Last_name_Account" id="Last_name_Account" value="{{ $account->Last_name_Account }}" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50">
            </li>

            <li>
                <label for="Birth_date_Account" class="block text-gray-700"><strong>Date de naissance :</strong></label>
                <input type="date" name="Birth_date_Account" id="Birth_date_Account" value="{{ $account->Birth_date_Account }}" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50">
            </li>

            <li>
                <label for="Id_Role" class="block text-gray-700"><strong>Rôle :</strong></label>
                {{-- <input type="number" name="Id_Role" id="Id_Role" value="{{ $account->Id_Role }}"> --}}
                <select name="Id_Role" id="Id_Role" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    <option value="1">Étudiant</option>
                    <option value="2">Pilote</option>
                    <option value="3">Admin</option>
                </select>
            </li>

            <li class="mx-auto w-fit">
                <button type="submit" class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-blue-500 hover:bg-blue-300 hover:text-black">
                    <strong>Mettre à jour</strong>
                </button>
            </li>
        </ul>
    </form>
</div>

@endsection
