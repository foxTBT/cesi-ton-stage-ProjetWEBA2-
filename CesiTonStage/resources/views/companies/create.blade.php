<form action="{{ route('companies.store') }}" method="POST">
    @csrf
    
    <label for="Name_Company">Name_Company :</label>
    <input type="text" id="Name_Company" name="Name_Company" required>

    <label for="Email_Company">Email_Company :</label>
    <input type="text" id="Email_Company" name="Email_Company" required>

    <label for="Phone_number_Company">Phone_number_Company :</label>
    <input type="text" id="Phone_number_Company" name="Phone_number_Company" required>

    <label for="Description_Company">Description_Company :</label>
    <input type="text" id="Description_Company" name="Description_Company" required>

    <label for="Siret_number_Company">Siret_number_Company :</label>
    <input type="text" id="Siret_number_Company" name="Siret_number_Company" required>

    <label for="Logo_link_Company">Logo_link_Company :</label>
    <input type="text" id="Logo_link_Company" name="Logo_link_Company" required>

    <label for="Id_City">Id_City :</label>
    <input type="text" id="Id_City" name="Id_City" required>

    <button type="submit">Ajouter</button>

    @if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
</form>
