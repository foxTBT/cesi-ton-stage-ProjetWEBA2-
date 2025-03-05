<form action="{{ route('regions.store') }}" method="POST">
    @csrf
    
    <label for="City_Region">Nom de la région :</label>
    <input type="text" id="City_Region" name="City_Region" required>

    <label for="Postal_code_Region">Code postal :</label>
    <input type="text" id="Postal_code_Region" name="Postal_code_Region" required>

    <button type="submit">Ajouter</button>

</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif




