<?php

namespace App\Http\Controllers;

use App\Models\UniteOeuvre;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UniteOeuvreController extends Controller
{
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
        $request->validate([
            'nom'=>'required|string',
        ]);

        try {
            $new_unite_oeuvre=UniteOeuvre::create(['nom_unite_oeuvre'=>$request->nom]);

            return redirect()->route('unite_oeuvre.create')->with('success','unite oeuvre added successfully');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->route('unite_oeuvre.create')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the resource.
     */
    public function show(): Factory|View|Application
    {
        $all_unite_oeuvre=UniteOeuvre::all();
        return view("unite-oeuvre.liste",compact("all_unite_oeuvre"));
    }
    
    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
        $unite_oeuvre_edit=UniteOeuvre::find($id);
        return view("unite-oeuvre.formulaire",compact("unite_oeuvre_edit"));
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request,$id_unite_oeuvre):RedirectResponse
    {
        //
        $request->validate([
            'nom'=>'required|string',
        ]);
        try {
            $update_unite_oeuvre=UniteOeuvre::where('id_unite_oeuvre',$id_unite_oeuvre)->update(['nom_unite_oeuvre'=>$request->nom]);
            
            return redirect()->route('unite_oeuvre.create')->with('success','unite oeuvre updated successfully');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->route('unite_oeuvre.create')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy($id_unite_oeuvre): RedirectResponse
    {
        try {
            UniteOeuvre::where('id_unite_oeuvre',$id_unite_oeuvre)->delete();
            return redirect()->route('unite_oeuvre.show')->with('success','unite oeuvre deleted successfully');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->route('unite_oeuvre.show')->with('error',$th->getMessage()) ;
            //throw $th;
        }
    }
}
