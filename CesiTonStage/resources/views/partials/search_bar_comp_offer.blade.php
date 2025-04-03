<div class="bg-white shadow-lg rounded-lg p-6 border">
    <h2 class="mx-auto w-fit text-xl font-semibold text-gray-800">Rechercher une offre de l'entreprise ?</h2>

    <form action="{{ route('companies.show', $company->Id_Company) }}" class="flex mx-auto w-fit mt-3 mb-3">
        <input type="search" name="term" class="border-2 border-black p-2 rounded-l-md focus:outline-none hover:bg-yellow-50">
        <button type="submit" class="border-2 border-black bg-yellow-500 text-black px-4 py-2 rounded-r-md -ml-px flex items-center justify-center hover:bg-yellow-400">
            <img src="{{ asset('images/searching.png') }}" alt="Chercher" class="w-6 h-6">
        </button>
    </form>
</div>
