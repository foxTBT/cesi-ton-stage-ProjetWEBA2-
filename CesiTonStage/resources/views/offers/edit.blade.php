@extends('layouts.app')

@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg border p-6">
    
    <h2 class="shadow-lg rounded-lg bg-yellow-500 text-xl font-semibold pt-2 pl-12 pr-12 pb-2 mb-6 text-center">
        <strong>Mise à jour de l'Offre</strong>
    </h2>

    <form action="{{ route('offers.update', ['id' => $offer->Id_Offer]) }}" method="POST">
        @csrf
        @method('PUT')

        <ul class="space-y-3">
            <li>
                <label for="Title_Offer" class="block text-gray-700"><strong>Titre de l'offre :</strong></label>
                <input type="text" name="Title_Offer" value="{{ $offer->Title_Offer }}" required 
                    class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50">
            </li>

            <div class="mb-4">
                <label for="Description_Offer" class="block text-gray-700"><strong>Description de l'offre :</strong></label>
                <textarea name="Description_Offer" required class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50">{{ $offer->Description_Offer }}</textarea>
            </li>

            <li>
                <label for="Salary_Offer" class="block text-gray-700"><strong>Salaire :</strong></label>
                <input type="number" name="Salary_Offer" value="{{ $offer->Salary_Offer }}"
                    class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50">
            </li>

            <li>
                <label for="Begin_date_Offer" class="block text-gray-700"><strong>Date de début :</strong></label>
                <input type="date" name="Begin_date_Offer" value="{{ $offer->Begin_date_Offer }}" required
                    class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50">
            </li>

            <li>
                <label for="End_date_Offer" class="block text-gray-700"><strong>Date de fin :</strong></label>
                <input type="date" name="End_date_Offer" value="{{ $offer->End_date_Offer }}"
                    class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50">
            </li>

            <li>
                <label for="Id_Category" class="block text-gray-700"><strong>Catégorie :</strong></label>
                <select name="Id_Category" id="Id_Category" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->Id_Category }}" {{ $category->Id_Category == $offer->Id_Category ? 'selected' : '' }}>
                            {{ $category->Name_Category }}
                        </option>
                    @endforeach
                </select>
            </li>

            <li>
                <label for="Id_Status" class="block text-gray-700"><strong>Statut :</strong></label>
                <select name="Id_Status" id="Id_Status" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->Id_Status }}" {{ $status->Id_Status == $offer->Id_Status ? 'selected' : '' }}>
                            {{ $status->Title_Status }}
                        </option>
                    @endforeach
                </select>
            </li>

            <li>
                <label for="Id_Account" class="block text-gray-700"><strong>Compte :</strong></label>
                <select name="Id_Account" id="Id_Account" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    @foreach ($accounts as $account)
                        <option value="{{ $account->Id_Account }}" {{ $account->Id_Account == $offer->Id_Account ? 'selected' : '' }}>
                            {{ $account->First_name_Account }} {{ $account->Last_name_Account }}
                        </option>
                    @endforeach
                </select>
            </li>

            <li>
                <label for="Id_Company" class="block text-gray-700"><strong>Entreprise :</strong></label>
                <select name="Id_Company" id="Id_Company" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->Id_Company }}" {{ $company->Id_Company == $offer->Id_Company ? 'selected' : '' }}>
                            {{ $company->Name_Company }}
                        </option>
                    @endforeach
                </select>
            </li>

            <li>
                <label for="skills" class="block text-gray-700"><strong>Compétences :</strong></label>
                <select name="skills[]" id="skills" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" multiple required>
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->Id_Skill }}" {{ $offer->skills->contains($skill->Id_Skill) ? 'selected' : '' }}>
                            {{ $skill->Name_Skill }}
                        </option>
                    @endforeach
                </select>
            </li>

            <li class="mx-auto w-fit mt-2">
                <button type="submit" class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-blue-500 hover:bg-blue-300 hover:text-black">
                    <strong>Mettre à jour</strong>
                </button>
            </li>
        </ul>
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