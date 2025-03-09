



<form action="{{ route('logins.store') }}" method="POST">
    @csrf
    
    <label for="Email_Account">Email_Account :</label>
    <input type="text" id="Email_Account" name="Email_Account" required>

    <label for="Password_Account">Password_Account :</label>
    <input type="text" id="Password_Account" name="Password_Account" required>

    <label for="First_name_Account">First_name_Account :</label>
    <input type="text" id="First_name_Account" name="First_name_Account" required>

    <label for="Last_name_Account">Last_name_Account :</label>
    <input type="text" id="Last_name_Account" name="Last_name_Account" required>

    <label for="Birth_date_Account">Birth_date_Account :</label>
    <input type="text" id="Birth_date_Account" name="Birth_date_Account" required>

    <label for="Id_Role">Id_Role :</label>
    <input type="text" id="Id_Role" name="Id_Role" required>

    <button type="submit">Ajouter</button>

    @if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
</form>


