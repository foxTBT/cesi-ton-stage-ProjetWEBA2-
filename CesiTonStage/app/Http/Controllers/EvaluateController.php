<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluate;
use App\Models\Company;

class EvaluateController extends Controller
{
    public function rate(Request $request, $companyId)
    {
        // Validation des données
        $request->validate([
            'note' => 'required|numeric|min:0|max:5',
        ]);

        // Récupérer l'ID de l'utilisateur connecté via la session
        $userId = session('account')->Id_Account;

        // Création ou mise à jour de l'évaluation
        $evaluate = Evaluate::updateOrCreate(
            ['Id_Account' => $userId, 'Id_Company' => $companyId],
            ['Rating' => $request->note]
        );

        // Retourner une réponse
        return redirect()->route('companies.show', $companyId)
            ->with('success', 'Évaluation ajoutée avec succès !')
            ->with('error', "Problème rencontré lors de l'évaluation !");
    }
}
