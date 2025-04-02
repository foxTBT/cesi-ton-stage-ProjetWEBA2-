@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('companies.update', $company->Id_Company) }}" method="POST">
        @csrf
        @method('PUT')

    <div class="bg-white shadow-lg rounded-lg border p-6 mt-4 mb-4">

        <h2 class="shadow-lg rounded-lg bg-yellow-500 text-xl font-semibold pt-2 pl-12 pr-12 pb-2 mb-6 text-center"><strong>Mise à jour de l'entreprise</strong></h2>

        <ul class="space-y-3">
            <li>
                <label for="Name_Company" class="block text-gray-700"><strong>Nom :</strong></label>
                <input type="text" id="Name_Company" name="Name_Company" value="{{ $company->Name_Company }}" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

                <li>
                    <label for="Email_Company" class="block text-gray-700"><strong>Email :</strong></label>
                    <input type="text" id="Email_Company" name="Email_Company"
                        value="{{ $company->Email_Company }}"
                        class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                </li>

                <li>
                    <label for="Phone_number_Company" class="block text-gray-700"><strong>Téléphone :</strong></label>
                    <input type="text" id="Phone_number_Company"
                        name="Phone_number_Company" value="{{ $company->Phone_number_Company }}"
                        class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                </li>

                <li>
                    <label for="Description_Company" class="block text-gray-700"><strong>Description :</strong></label>
                    <input type="text" id="Description_Company"
                        name="Description_Company" value="{{ $company->Description_Company }}"
                        class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                </li>

                <li>
                    <label for="Siret_number_Company" class="block text-gray-700"><strong>SIRET :</strong></label>
                    <input type="text" id="Siret_number_Company"
                        name="Siret_number_Company" value="{{ $company->Siret_number_Company }}"
                        class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                </li>

                <li>
                    <label for="Logo_link_Company" class="block text-gray-700"><strong>Chemin Logo :</strong></label>
                    <input type="text" id="Logo_link_Company"
                        name="Logo_link_Company" value="{{ $company->Logo_link_Company }}"
                        class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                </li>

                <li>
                    <label for="Id_City" class="block text-gray-700"><strong>Ville :</strong></label>
                    <select name="Id_City" id="Id_City" class="w-full px-4 py-2 border rounded-lg" required>
                        @foreach ($cities as $city)
                            <option value="{{ $city->Id_City }}">{{ $city->Name_City }}</option>
                        @endforeach
                    </select>
                </li>

            <li class="mx-auto w-fit">
                <button type="submit" class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-blue-500 hover:bg-blue-300 hover:text-black"><strong>Mettre à jour</strong></button>
            </li>
        </ul>
    </div>
</form>
@endsection
