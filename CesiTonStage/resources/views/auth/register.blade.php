@extends('layouts.app') <!-- Étend le layout 'app', permettant de réutiliser des éléments communs comme l'en-tête, le pied de page et la structure de la page -->

@section('content') <!-- Début de la section 'content' qui sera remplie dans le layout parent -->

<!-- Conteneur principal de la page -->
<div class="container">
    <!-- Création d'une rangée (row) avec un alignement centré pour le contenu -->
    <div class="row justify-content-center">
        <!-- Colonne pour contenir le formulaire (prise de 8 sur 12 dans une grille de Bootstrap) -->
        <div class="col-md-8">
            <!-- Carte pour afficher le formulaire d'inscription -->
            <div class="card">
                <!-- Entête de la carte avec le titre 'Register' -->
                <div class="card-header">{{ __('Register') }}</div>

                <!-- Corps de la carte contenant le formulaire -->
                <div class="card-body">
                    <!-- Début du formulaire d'inscription. L'action soumet les données à la route 'register.store' -->
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf <!-- Protection CSRF pour éviter les attaques de type CSRF -->

                        <!-- Section pour le champ 'Nom' -->
                        <div class="row mb-3">
                            <!-- Label pour le champ 'Nom' -->
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <!-- Champ de saisie pour le nom avec gestion des erreurs -->
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                <!-- Affichage d'un message d'erreur si le champ 'name' est invalide -->
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section pour le champ 'Email' -->
                        <div class="row mb-3">
                            <!-- Label pour le champ 'Email' -->
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <!-- Champ de saisie pour l'email avec gestion des erreurs -->
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                <!-- Affichage d'un message d'erreur si le champ 'email' est invalide -->
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section pour le champ 'Mot de passe' -->
                        <div class="row mb-3">
                            <!-- Label pour le champ 'Mot de passe' -->
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <!-- Champ de saisie pour le mot de passe avec gestion des erreurs -->
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                <!-- Affichage d'un message d'erreur si le champ 'password' est invalide -->
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section pour le champ 'Confirmation du mot de passe' -->
                        <div class="row mb-3">
                            <!-- Label pour le champ 'Confirmer mot de passe' -->
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <!-- Champ de saisie pour la confirmation du mot de passe -->
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Section pour le bouton de soumission du formulaire -->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <!-- Bouton pour soumettre le formulaire -->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }} <!-- Texte du bouton -->
                                </button>
                            </div>
                        </div>
                    </form> <!-- Fin du formulaire -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection <!-- Fin de la section 'content' -->
