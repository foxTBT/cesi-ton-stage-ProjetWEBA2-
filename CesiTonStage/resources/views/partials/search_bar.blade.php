<form action="{{ route('companies.index') }}" class="flex">
    <input type="search" name="term" class="border-2 border-black p-2 rounded-l-md focus:outline-none hover:bg-yellow-50">
    <button type="submit" class="border-2 border-black bg-yellow-500 text-black px-4 py-2 rounded-r-md -ml-px flex items-center justify-center hover:bg-yellow-400">
        <img src="{{ asset('images/searching.png') }}" alt="Chercher" class="w-6 h-6">
    </button>
</form>
