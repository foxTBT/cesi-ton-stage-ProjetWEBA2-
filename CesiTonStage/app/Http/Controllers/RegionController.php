<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function create()
    {
        return view('regions.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'City_Region' => 'required|string|max:255',
            'Postal_code_Region' => 'required|string|max:255',
        ]);
        
        Region::create([
            'City_Region' => $request->City_Region,
            'Postal_code_Region' => $request->Postal_code_Region,
        ]);
        

        // Rediriger vers une page de succès ou afficher un message
        return redirect()->route('regions.create')->with('success', 'Région ajoutée avec succès !');
    }
}
