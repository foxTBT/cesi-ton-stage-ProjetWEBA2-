



<form action="{{ route('regions.store') }}" method="POST">
    @csrf
    @method('POST')  <!-- Ajout explicite de la méthode -->

    <label for="Name_Region">Nom région :</label>
    <input type="text" id="Name_Region" name="Name_Region" required>

    <button type="submit">Ajouter</button>

    


    @if (session('success1'))
    <p style="color: green;">{{ session('success1') }}</p>
    @endif



</form>

