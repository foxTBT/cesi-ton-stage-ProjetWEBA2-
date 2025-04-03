<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluate;
use App\Models\Company;

class EvaluateController extends Controller
{
    public function rate(Request $request, $Id_Company){
        try {
            // Validation des données
            $request->validate([
                'note' => 'required|numeric|min:0|max:5',
            ]);

            // Récupérer l'ID de l'utilisateur connecté via la session
            $userId = session('account')->Id_Account;

            // Création ou mise à jour de l'évaluation
            $evaluate = Evaluate::updateOrCreate(
                ['Id_Account' => $userId, 'Id_Company' => $Id_Company],
                ['Rating' => $request->note]
            );

            // Retourner une réponse
            return redirect()->route('companies.show', $Id_Company)
                ->with('success', 'Évaluation ajoutée avec succès !');
        }
        catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('companies.show', $Id_Company)
                ->with('error', "Problème rencontré lors de l'évaluation !");
        }
    }

    // Fonction pour calculer et afficher la moyenne d'une entreprise
    public function show($Id_Company)
    {
        $company = Company::findOrFail($Id_Company);
        
        // Calcul de la moyenne des notes pour cette entreprise
        $averageRating = Evaluate::where('Id_Company', $Id_Company)->avg('Rating');

        return view('companies.show', compact('company', 'averageRating'));
    }
}
