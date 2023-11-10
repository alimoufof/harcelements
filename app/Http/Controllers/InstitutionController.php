<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.institutions.create', [
            'institution' => new Institution(),
        ]);
    }

    public function show(Institution $institution)
    {
        return view('admin.institutions.show', [
            'institution' => $institution,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstitutionRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image'))
        {
            $imagePath = $request->file('image')->store('institution_images', 'public');
            $data['image'] = $imagePath;
        }

        Institution::create($data);

        return to_route('institution.index')->with('status', "Ajout de l'institution effectuée avec succès");
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
        $data = $request->validated();

        if($request->hasFile('image'))
        {
            if($institution->image)
            {
                Storage::disk('public')->delete($institution->image);
            }
            
            $imagePath = $request->file('image')->store('institution_images', 'public');
            $data['image'] = $imagePath;
        }
        
        return to_route('institution.index')->with('status', "Modification de l'institution effectuée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        if($institution->image)
        {
            Storage::disk('public')->delete($institution->image);
        }

        $institution->delete();
        return to_route('institution.index')->with('status', "Suppression de l'institution effectuée avec succès");
    }
}
