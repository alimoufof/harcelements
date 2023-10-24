<?php

namespace App\Http\Controllers;

use App\Models\Harcelement;
use App\Http\Requests\StoreHarcelementRequest;
use App\Http\Requests\UpdateHarcelementRequest;

class HarcelementController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $harcelements = Harcelement::all();
        return view('admin.harcelements.index', compact('harcelements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.harcelements.edit', [
            'harcelement' => new Harcelement(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHarcelementRequest $request)
    {
        $harcelement = Harcelement::create($request->validated());
        return to_route('admin.harcelement.index')->with('status', 'Ajout de '. $request->type . ' effectué avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Harcelement $harcelement)
    {
        return view('admin.harcelements.edit', [
            'harcelement' => $harcelement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHarcelementRequest $request, Harcelement $harcelement)
    {
        $harcelement->update($request->validated());
        return to_route('admin.harcelement.index')->with('status', 'Modification de '. $request->type . ' effectué avec succès');
    }

    /**
     * Remove the specified resource from storage.bl
     */
    public function destroy(Harcelement $harcelement)
    {
        $harcelement->delete();
        return to_route('admin.harcelement.index')->with('status', 'Suppression de '. $harcelement->type . ' effectué avec succès');
    }
}
