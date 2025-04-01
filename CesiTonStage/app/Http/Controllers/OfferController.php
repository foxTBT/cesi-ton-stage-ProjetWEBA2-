<?php
namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Status;

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
        $accounts = Account::whereIn('Id_Role', [2, 3])->get();
        $companies = Company::all();
        $statuses = Status::whereIn('Id_Status', [1])->get();
        return view('offers.create', compact('accounts','companies', 'statuses'));
    }

    public function apply()
    {
        
    }


    public function store(Request $request)
    {
     // Valider les données du formulaire
    $request->validate([
        'Title_Offer' => 'required|string|max:255',
        'Description_Offer' => 'required|string|max:65535',
        'Begin_date_Offer' => 'required|date',
        'Duration_Offer' => 'required|date',
        'Salary_Offer' => 'required|integer',
        'Id_Category' => 'required|integer',
        'Id_Status' => 'required|integer',
        'Id_Account' => 'required|integer',
        'Id_Company' => 'required|integer',
     ]);
        
    Offer::create([
        'Title_Offer' => $request->Title_Offer,
        'Description_Offer' => $request->Description_Offer,
        'Begin_date_Offer' => $request->Begin_date_Offer,
        'Duration_Offer' => $request->Duration_Offer,
        'Salary_Offer' => $request->Salary_Offer,
        'Id_Category' => $request->Id_Category,
        'Id_Status' => $request->Id_Status,
        'Id_Account' => $request->Id_Account,
        'Id_Company' => $request->Id_Company,
        
    ]);
    return redirect()->route('offers.index')->with('success', 'Offre ajoutée avec succès !');
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        return view('offers.edit', compact('offer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Title_Offer' => 'required|string|max:255',
            'Description_Offer' => 'required|string',
            'Salary_Offer' => 'nullable|numeric',
            'Begin_date_Offer' => 'required|date',
            'Duration_Offer' => 'nullable|date',
            'Id_Category' => 'nullable|exists:categories,Id_Category',
            'Id_Status' => 'nullable|exists:statuses,Id_Status',
        ]);
    
        $offer = Offer::findOrFail($id);
        $offer->update($request->all());
    
        return redirect()->route('offers.index')->with('success', 'Offre mise à jour avec succès !');
    }
    

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return redirect()->route('offers.index')->with('success', 'Offre supprimée avec succès.');
    }
}
