@extends('layouts.app')

@section('content')

<div class="bg-gray-100 shadow-lg rounded-lg border p-6">

    <h2 class="shadow-lg rounded-lg bg-yellow-500 text-xl font-semibold pt-2 pl-12 pr-12 pb-2 mb-6 text-center">
        <strong>Créer une offre</strong>
    </h2>

    <form action="{{ route('offers.store') }}" method="POST" class="flex flex-col justify-center">
        @csrf

        <ul class="space-y-3">
            <li>
                <label for="Title_Offer" class="block text-gray-700"><strong>Titre de l'offre :</strong></label>
                <input type="string" name="Title_Offer" id="Title_Offer"
                class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Description_Offer" class="block text-gray-700"><strong>Description de l'offre</strong></label>
                <input type="string" name="Description_Offer" id="Description_Offer"
                class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Begin_date_Offer" class="block text-gray-700"><strong>Date de début de l'offre :</strong></label>
                <input type="date" name="Begin_date_Offer" id="Begin_date_Offer"
                class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="End_date_Offer" class="block text-gray-700"><strong>Date de fin de l'offre :</strong></label>
                <input type="date" name="End_date_Offer" id="End_date_Offer"
                class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Salary_Offer" class="block text-gray-700"><strong>Montant du salaire annuel :</strong></label>
                <input type="integer" name="Salary_Offer" id="Salary_Offer"
                class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Id_Category" class="block text-gray-700"><strong>Catégorie :</strong></label>
                <select name="Id_Category" id="Id_Category" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    <option value="1">Stage</option>
                    <option value="2">Alternance</option>
                </select>
            </li>

            <li>
                <label for="Id_Status" class="block text-gray-700"><strong>Status :</strong></label>
                <select name="Id_Status" id="Id_Status" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->Id_Status }}">{{ $status->Title_Status }}</option>                
                    @endforeach
                </select>
            </li>

            <li>
                <label for="Id_Account" class="block text-gray-700"><strong>Compte :</strong></label>
                <select name="Id_Account" id="Id_Account" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    @foreach ($accounts as $account)
                    <option value="{{ $account->Id_Account }}">{{ $account->First_name_Account }} {{ $account->Last_name_Account }}</option>
                    @endforeach
                </select>
            </li>

            <li>
                <label for="Id_Company" class="block text-gray-700"><strong>Entreprise :</strong></label>
                <select name="Id_Company" id="Id_Company" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
                    @foreach ($companies as $company)
                    <option value="{{ $company->Id_Company }}">{{ $company->Name_Company }}</option>
                    @endforeach
                </select>
            </li>

            <li>
                <label for="skills" class="block text-gray-700"><strong>Compétences :</strong></label>
                <select name="skills[]" id="skills" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" multiple required>
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->Id_Skill }}">{{ $skill->Name_Skill }}</option>
                    @endforeach
                </select>
            </li>

            <li class="mx-auto w-fit">
                <button type="submit" class="text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-green-500 hover:bg-green-300 hover:text-black">
                    <strong>Créer l'offre</strong>
                </button>
            </li>
    </form>
</div>

<script>
    // Vérifier si l'utilisateur est connecté
    if ({{ session('account') ? 'true' : 'false' }}) {
        const userRole = {{ session('account')->Id_Role }}; // récupère l'Id_Role de l'utilisateur connecté

            // Vérifier le rôle de l'utilisateur connecté
            if (userRole < 2) {
                alert("Vous n'avez pas les permissions pour pouvoir créer une entreprise");
                event.preventDefault(); // Empêche l'envoi du formulaire si le rôle ne correspond pas
            }
        });
    } 
    
    else {
        // Rediriger vers la page d'accueil si l'utilisateur n'est pas connecté
        window.location.href = '/'; // '/' pour d'accueil de ton site si nécessaire
    }
</script>

@endsection

<script>
    $(document).ready(function() {
        $('#skills').select2({
            placeholder: "Sélectionnez des compétences",
            allowClear: true,
            width: '100%' // Pour s'assurer qu'il s'adapte bien à l'écran
        });
    });
</script>
