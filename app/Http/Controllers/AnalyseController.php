<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnalyseController extends Controller
{
    //
    /**
     * Show the form for creating the resource.
     */
    public function create(): View|Factory|Application
    {
        return view("unite-oeuvre.formulaire");
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse     
    {
        
    }

    /**
     * Display the resource.
     */
    public function show(): Factory|View|Application
    {
      
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
    public function update(Request $request,$id_unite_oeuvre):RedirectResponse
    {
        //
       
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy($id_unite_oeuvre): RedirectResponse
    {
        
    }
}
