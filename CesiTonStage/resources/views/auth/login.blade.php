@extends('layouts.app')

@section('content')
<form action="{{ route('login') }}" method="POST">
    @csrf
    <label>Email:</label>
    <input type="text" name="Email_Account" required>
    
    <label>Mot de passe :</label>
    <input type="text" name="Password_Account" required>

    <button type="submit" class="bg-yellow-500 hover:bg-orange-400 text-white font-bold py-2 px-4 border-2 border-black rounded">Se connecter</button>

</form>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@endsection