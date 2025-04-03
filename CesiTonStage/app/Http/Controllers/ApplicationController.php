<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{

    public function create($offerId)
    {
        $account = session('account');
    
        if (!$account) {
            return redirect('/login')->with('error', 'Vous devez être connecté pour postuler.');
        }
    
        if ($account->Id_Role != 1) {
            return redirect('/login')->with('error', 'Vous n\'avez pas les permissions pour postuler.');
        }
    
        return view('applications.create', compact('offerId'));
    }
    

    public function store(Request $request, $offerId)
    {
        $idAccount = session('account')['Id_Account'] ?? null; // Récupère l'ID utilisateur depuis la session
    
        $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string|max:5000',
        ]);

        // Stockage du fichier CV
        $cvPath = $request->file('cv')->store('cv_uploads');

        // Création de la candidature
        Application::create([
            'Id_Account' => $idAccount, // Utilisation de l'ID de l'utilisateur stocké dans la session
            'Id_Offer' => $offerId,
            'Cv_link_Application' => $cvPath,
            'Cover_letter_Application' => $request->input('cover_letter'),
            'Date_Application' => now(),
        ]);

        return redirect()->route('offers.index')->with('success', 'Votre candidature a été soumise avec succès.');
    }
}
