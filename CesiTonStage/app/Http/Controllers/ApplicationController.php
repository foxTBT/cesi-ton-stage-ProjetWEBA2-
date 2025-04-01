<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function create($offerId)
    {
        // Vérification de l'authentification avant d'afficher la page
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour postuler.');
        }

        // Debug : Vérifie que l'utilisateur est bien authentifié
        dd(auth()->check(), auth()->id(), auth()->user());

        return view('applications.create', compact('offerId'));
    }

    public function store(Request $request, $offerId)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour postuler.');
        }

        // Vérifie si l'utilisateur a un Id_Account valide
        $idAccount = auth()->user()->Id_Account ?? null;
        if (!$idAccount) {
            return redirect()->route('login')->with('error', 'Erreur d’authentification. Veuillez vous reconnecter.');
        }
    
        $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string|max:5000',
        ]);

        // Stockage du fichier CV
        $cvPath = $request->file('cv')->store('cv_uploads');
    
        // Création de la candidature
        Application::create([
            'Id_Account' => $idAccount,
            'Id_Offer' => $offerId,
            'Cv_link_Application' => $cvPath,
            'Cover_letter_Application' => $request->input('cover_letter'),
            'Date_Application' => now(),
        ]);
    
        return redirect()->route('offers.index')->with('success', 'Votre candidature a été soumise avec succès.');
    }
}
