<?php

namespace App\Http\Controllers;

use App\Models\CentreOperationel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class CentreController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): Factory|View|Application
    {
        return view("centre.formulaire");
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "nom"=> "required|string",
            "type_opp"=>"required|in:0,1",
        ]);
        try {
            $centre=CentreOperationel::create([
                "nom_centre_opp"=> $request->nom,
                "est_structure"=>$request->type_opp == '1',
            ]);

            return redirect()->route("centre.create")->with("success","centre oparationnel inserted successfully");
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->route('centre.create')->with('error', $th->getMessage());
            //throw $th;
        }
    }

    /**
     * Display the resource.
     */
    public function show(): Factory|View|Application
    {
        $all_centre=centreOperationel::all();
        return view("centre.liste",compact("all_centre"));
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
        //
        $centre_edit=CentreOperationel::find($id);
        return view("centre.formulaire",compact("centre_edit"));
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request,$id_centre_opp):RedirectResponse
    {
        //
        $request->validate([
            "nom"=> "required|string",
            "type_opp"=>"required|in:0,1",
        ]);

        try {
            $update_centre_opp=CentreOperationel::where('id_centre_opp',$id_centre_opp)->update([
                "nom_centre_opp"=> $request->nom,
                "est_structure"=>$request->type_opp == '1',
            ]);
            return redirect()->route("centre.create")->with("success","centre oparationnel updated successfully");
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->route('centre.create')->with('error', $th->getMessage());
            //throw $th;
        }
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy($id_centre_opp): RedirectResponse
    {
        try {
            CentreOperationel::where('id_centre_opp',$id_centre_opp)->delete();
            return redirect()->route("centre.create")->with("success","centre oparationnel deleted successfully");
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->route('centre.create')->with('error', $th->getMessage());
            //throw $th;
        }
    }
}
