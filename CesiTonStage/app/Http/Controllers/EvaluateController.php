<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluate;
use App\Models\Company;

class EvaluateController extends Controller
{
    public function rate(Request $request, $Id_Company)
    {
        $request->validate([
            'Rating' => 'required|integer|min:1|max:5',
        ]);

        $evaluate = Evaluate::updateOrCreate(
            [
                'Id_Account' => auth()->id(),
                'Id_Company' => $Id_Company,
            ],
            ['Rating' => $request->Rating]
        );

        return redirect()->route('companies.rate', $Id_Company)->with('success', 'Évaluation enregistrée avec succès.');
    }
}