@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="my-4 text-center text-xl font-semibold text-gray-800 mb-4">Modifier l'Offre</h1>
    <form action="{{ route('offers.update', ['id' => $offer->Id_Offer]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="Title_Offer" class="block text-gray-700">Titre de l'offre :</label>
            <input type="text" name="Title_Offer" value="{{ $offer->Title_Offer }}" required class="border p-2 w-full">
        </div>

        <div class="mb-4">
            <label for="Description_Offer" class="block text-gray-700">Description de l'offre :</label>
            <textarea name="Description_Offer" required class="border p-2 w-full">{{ $offer->Description_Offer }}</textarea>
        </div>

        <div class="mb-4">
            <label for="Salary_Offer" class="block text-gray-700">Salaire :</label>
            <input type="number" name="Salary_Offer" value="{{ $offer->Salary_Offer }}" class="border p-2 w-full">
        </div>

        <div class="mb-4">
            <label for="Begin_date_Offer" class="block text-gray-700">Date de début :</label>
            <input type="date" name="Begin_date_Offer" value="{{ $offer->Begin_date_Offer }}" required class="border p-2 w-full">
        </div>

        <div class="mb-4">
            <label for="End_date_Offer" class="block text-gray-700">Date de fin :</label>
            <input type="date" name="End_date_Offer" value="{{ $offer->End_date_Offer }}" class="border p-2 w-full">
        </div>

        <div class="mb-4">
            <label for="Id_Category" class="block text-gray-700">Catégorie :</label>
            <select name="Id_Category" id="Id_Category" class="border p-2 w-full" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->Id_Category }}" {{ $category->Id_Category == $offer->Id_Category ? 'selected' : '' }}>
                        {{ $category->Name_Category }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="Id_Status" class="block text-gray-700">Statut :</label>
            <select name="Id_Status" id="Id_Status" class="border p-2 w-full" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status->Id_Status }}" {{ $status->Id_Status == $offer->Id_Status ? 'selected' : '' }}>
                        {{ $status->Title_Status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="Id_Account" class="block text-gray-700">Compte :</label>
            <select name="Id_Account" id="Id_Account" class="border p-2 w-full" required>
                @foreach ($accounts as $account)
                    <option value="{{ $account->Id_Account }}" {{ $account->Id_Account == $offer->Id_Account ? 'selected' : '' }}>
                        {{ $account->First_name_Account }} {{ $account->Last_name_Account }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="Id_Company" class="block text-gray-700">Entreprise :</label>
            <select name="Id_Company" id="Id_Company" class="border p-2 w-full" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->Id_Company }}" {{ $company->Id_Company == $offer->Id_Company ? 'selected' : '' }}>
                        {{ $company->Name_Company }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="skills" class="block text-gray-700">Compétences :</label>
            <select name="skills[]" id="skills" class="border p-2 w-full" multiple required>
                @foreach ($skills as $skill)
                    <option value="{{ $skill->Id_Skill }}" {{ $offer->skills->contains($skill->Id_Skill) ? 'selected' : '' }}>
                        {{ $skill->Name_Skill }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Mettre à jour</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#skills').select2({
            placeholder: "Sélectionnez des compétences",
            allowClear: true,
            width: '100%' // Pour s'assurer qu'il s'adapte bien à l'écran
        });
    });
</script>
@endsection