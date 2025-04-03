@extends('layouts.app')

@section('content')
<div class="max-w-100 mx-auto bg-white shadow-lg rounded-lg p-6 border mt-4">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Créer une offre</h2>

    <form action="{{ route('offers.store') }}" method="POST" class="flex flex-col justify-center">
        @csrf

        <div class="mb-4">
            <label for="Title_Offer" class="block text-gray-700">Titre de l'offre :</label>
            <input type="string" name="Title_Offer" id="Title_Offer" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="Description_Offer" class="block text-gray-700">Description de l'offre</label>
            <input type="string" name="Description_Offer" id="Description_Offer" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="Begin_date_Offer" class="block text-gray-700">Date de début de l'offre :</label>
            <input type="date" name="Begin_date_Offer" id="Begin_date_Offer" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="Duration_Offer" class="block text-gray-700">Date de fin de l'offre :</label>
            <input type="date" name="Duration_Offer" id="Duration_Offer" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="Salary_Offer" class="block text-gray-700">Montant du salaire annuel :</label>
            <input type="integer" name="Salary_Offer" id="Salary_Offer" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="Id_Category" class="block text-gray-700">Catégorie :</label>
            <select name="Id_Category" id="Id_Category" class="w-full px-4 py-2 border rounded-lg" required>
                <option value="1">Stage</option>
                <option value="2">Alternance</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="Id_Status" class="block text-gray-700">Status :</label>
            <select name="Id_Status" id="Id_Status" class="w-full px-4 py-2 border rounded-lg" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status->Id_Status }}">{{ $status->Title_Status }}</option>                
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="Id_Account" class="block text-gray-700">Compte :</label>
            <select name="Id_Account" id="Id_Account" class="w-full px-4 py-2 border rounded-lg" required>
                @foreach ($accounts as $account)
                   <option value="{{ $account->Id_Account }}">{{ $account->First_name_Account }} {{ $account->Last_name_Account }}</option>
                 @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="Id_Company" class="block text-gray-700">Entreprise : </label>
            <select name="Id_Company" id="Id_Company" class="w-full px-4 py-2 border rounded-lg" required>
                @foreach ($companies as $company)
                   <option value="{{ $company->Id_Company }}">{{ $company->Name_Company }}</option>
                 @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="skills" class="block text-gray-700">Compétences :</label>
            <select name="skills[]" id="skills" class="w-full px-4 py-2 border rounded-lg" multiple required>
                @foreach ($skills as $skill)
                    <option value="{{ $skill->Id_Skill }}">{{ $skill->Name_Skill }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:bg-yellow-300 hover:text-black">Créer l'offre</button>
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
