<form action="{{ route('login') }}" method="POST">
    @csrf
    <label>Email:</label>
    <input type="text" name="Email_Account" required>
    
    <label>Mot de passe :</label>
    <input type="text" name="Password_Account" required>

    <button type="submit">Se connecter</button>
</form>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
