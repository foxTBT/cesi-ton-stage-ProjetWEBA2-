<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

// class OfferController extends Controller{
//     // public function index(){
//     //     $offers = Offer::with('company');

//     //     return view('offers.index', compact('offers'));
//     // }

//     // public function create(){
//     //     return view('offers.create');
//     // }
//     // public function store(Request $request)
//     // {
//     //     // Valider les données du formulaire
//     //     $request->validate([
//     //         'Title_Offer' => 'required|string|max:255',
//     //         'Description_Offer' => 'required|string|max:65535',
//     //         'Begin_date_Offer' => 'required|date format:Y-m-d',
//     //         'Duration_Offer' => 'required|date format:Y-m-d',
//     //         'Salary_Offer' => 'required|integer',
//     //         'Id_Region' => 'required|integer',
//     //     ]);
        
//     //     Offer::create([
//     //         'Title_Offer' => $request->Title_Offer,
//     //         'Description_Offer' => $request->Description_Offer,
//     //         'Begin_date_Offer' => $request->Begin_date_Offer,
//     //         'Duration_Offer' => $request->Duration_Offer,
//     //         'Salary_Offer' => $request->Salary_Offer,
//     //         'Id_Region' => $request->Id_Region,
//     //     ]);
        

//     //     // Rediriger vers une page de succès ou afficher un message
//     //     return redirect()->route('offers.create')->with('success', 'Offre ajoutée avec succès !');
//     // }

// }

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::with(['category', 'status', 'account', 'company'])->get();
        return view('offers.index', compact('offers'));
    }

    public function show($id)
    {
        $offer = Offer::with(['category', 'status', 'account', 'company'])->findOrFail($id);
        return view('offers.index', compact('offer'));
    }

    public function create()
    {
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
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        return view('offers.edit', compact('offer'));
    }

    public function update(Request $request, $id)
    {
        // Logic for updating an offer
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return redirect()->route('offers.index');
    }
}

