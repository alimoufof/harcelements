<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutions = Institution::all();
        return view('admin.institutions.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.institutions.edit', [
            'institution' => new Institution(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstitutionRequest $request)
    {
        $institution = Institution::create($request->validated());
        return to_route('admin.institution.index')->with('status', "Ajout de l'institution effectuée avec succès");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institution $institution)
    {
        // dd($institution->type);
        return view('admin.institutions.edit', [
            'institution' => $institution,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstitutionRequest $request, Institution $institution)
    {
        $institution->update($request->validated());
        return to_route('admin.institution.index')->with('status', "Modification de l'institution effectuée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        $institution->delete();
        return to_route('admin.institution.index')->with('status', "Suppression de l'institution effectuée avec succès");
    }
}
