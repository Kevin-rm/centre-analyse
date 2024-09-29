<?php

namespace App\Http\Controllers;

use App\Models\CentreOperationel;
use App\Models\Charge;
use App\Models\UniteOeuvre;

use App\Models\PourcentageCharge;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ChargeController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): Factory|View|Application
    {
        $unite_oeuvre=UniteOeuvre::all();
        $centre_opp=CentreOperationel::all();
        return view("charge.formulaire",compact("unite_oeuvre","centre_opp"));
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validation des données
        $request->validate([
            "nom"=>'required|string|max:255',
            "prix"=>'required|numeric',
            "unite_oeuvre"=>'required|integer',
            "nature"=>'required|in:0,1',
            "centre_opp"=>'required|array',
            "pourcentage"=>'required|array',
            'pourcentage.*' => 'required|numeric|min:0|max:100',
            'centre_opp.*' => 'required|integer',
        ]);

        try {
            //création de la charge
            $charge = Charge::create([
                'nom_charge'=>$request->nom,
                'total'=>$request->prix,
                'id_unite_oeuvre'=>$request->unite_oeuvre,
                'nature'=> $request->nature == '1',
            ]);

            // Insertion des pourcentages
            foreach ($request->pourcentage as $index => $pourcentage) {
                PourcentageCharge::create([
                    'id_charge'=>$charge->id_charge,
                    'id_centre_opp'=>$request->centre_opp[$index],
                    'pourcentage'=>$pourcentage,
                ]);
            }
    
            return redirect()->route('charge.create')->with('success','charge inserted successfully');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->route('charge.create')->with('error',$th->getMessage());       
        }
    }

    /**
     * Display the resource.
     */
    public function show(): Factory|View|Application
    {
        return view("charge.liste");
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
