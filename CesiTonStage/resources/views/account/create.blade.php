@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Créer un compte</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('account.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Email_Account" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email_Account" name="Email_Account" required>
        </div>
        <div class="mb-3">
            <label for="Password_Account" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="Password_Account" name="Password_Account" required>
        </div>
        <div class="mb-3">
            <label for="First_name_Account" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="First_name_Account" name="First_name_Account" required>
        </div>
        <div class="mb-3">
            <label for="Last_name_Account" class="form-label">Nom</label>
            <input type="text" class="form-control" id="Last_name_Account" name="Last_name_Account" required>
        </div>
        <div class="mb-3">
            <label for="Birth_date_Account" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" id="Birth_date_Account" name="Birth_date_Account" required>
        </div>
        <div class="mb-3">
            <label for="Id_Role" class="form-label">Rôle</label>
            <select class="form-select" id="Id_Role" name="Id_Role" required>
                <option value="1">Admin</option>
                <option value="2">Utilisateur</option>
            </select>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Se souvenir de moi</label>
        </div>
        
        <button type="submit" class="btn btn-primary">Créer le compte</button>
    </form>
</div>
@endsection
