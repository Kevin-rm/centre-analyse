<?php

namespace App\Http\Controllers;

use App\Models\EtatProduit;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AnalyseController extends Controller
{
    //
    /**
     * Show the form for creating the resource.
     */

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)     
    {
        
    }

    /**
     * Display the resource.
     */
    public function show(): Factory|View|Application
    {
        $all_etat_produit = DB::select("select * from cout_grain"); // Récupération de toutes les étapes de produit
            
        return view("analyse", compact("all_etat_produit")); // Passage des données à la vue
    }
    
    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the resource in storage.
     */
   
}
