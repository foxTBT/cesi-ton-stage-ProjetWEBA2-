<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller{
    public function index(){
        $offers = Offer::all();
        return view('offers.index', compact('offers'));
    }

    public function create(){
        return view('offers.create');
    }
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'Title_Offer' => 'required|string|max:255',
            'Description_Offer' => 'required|string|max:65535',
            'Begin_date_Offer' => 'required|date format:Y-m-d',
            'Duration_Offer' => 'required|date format:Y-m-d',
            'Salary_Offer' => 'required|integer',
            'Id_Region' => 'required|integer',
        ]);
        
        Offer::create([
            'Title_Offer' => $request->Title_Offer,
            'Description_Offer' => $request->Description_Offer,
            'Begin_date_Offer' => $request->Begin_date_Offer,
            'Duration_Offer' => $request->Duration_Offer,
            'Salary_Offer' => $request->Salary_Offer,
            'Id_Region' => $request->Id_Region,
        ]);
        

        // Rediriger vers une page de succès ou afficher un message
        return redirect()->route('offers.create')->with('success', 'Offre ajoutée avec succès !');
    }
}

