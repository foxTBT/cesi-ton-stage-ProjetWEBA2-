<script src="https://cdn.tailwindcss.com"></script>

<form action="{{ route('companies.store') }}" method="POST">
    @csrf

    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg border p-6 mt-4 mb-4">

        <h2 class="shadow-lg rounded-lg bg-yellow-500 mx-auto w-fit text-xl font-semibold pt-2 pl-12 pr-12 pb-2 mb-6"><strong>Création d'entreprise</strong></h2>

        <ul class="space-y-3 mx-auto w-fit">
            <li>
                <label for="Name_Company" class="block text-gray-700"><strong>Nom :</strong></label>
                <input type="text" id="Name_Company" name="Name_Company" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Email_Company" class="block text-gray-700"><strong>Email :</strong></label>
                <input type="text" id="Email_Company" name="Email_Company" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Phone_number_Company" class="block text-gray-700"><strong>Téléphone :</strong></label>
                <input type="text" id="Phone_number_Company" name="Phone_number_Company" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Description_Company" class="block text-gray-700"><strong>Description :</strong></label>
                <input type="text" id="Description_Company" name="Description_Company" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Siret_number_Company" class="block text-gray-700"><strong>SIRET :</strong></label>
                <input type="text" id="Siret_number_Company" name="Siret_number_Company" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Logo_link_Company" class="block text-gray-700"><strong>Chemin Logo :</strong></label>
                <input type="text" id="Logo_link_Company" name="Logo_link_Company" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li>
                <label for="Id_City" class="block text-gray-700"><strong>Ville :</strong></label>
                <input type="text" id="Id_City" name="Id_City" class="border-gray-700 w-full px-4 py-2 border rounded-lg hover:bg-yellow-50" required>
            </li>

            <li class="mx-auto w-fit">
                <button type="submit" class="bg-white text-yellow-500 px-4 py-2 rounded h-min border-yellow-500 border-2 hover:border-green-500 hover:bg-green-300 hover:text-black"><strong>Ajouter</strong></button>
            </li>
        </ul>
    </div>

    @if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
</form>
