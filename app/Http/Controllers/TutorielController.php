<?php

namespace App\Http\Controllers;

use App\Models\Tutoriel;
use App\Http\Requests\StoreTutorielRequest;
use App\Http\Requests\UpdateTutorielRequest;

class TutorielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutoriels = Tutoriel::all();
        return view('admin.tutoriels.index', compact('tutoriels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tutoriels.edit', [
            'tutoriel' => new Tutoriel(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTutorielRequest $request)
    {
        $tutoriel = Tutoriel::create($request->validated());
        return to_route('admin.tutoriel.index')->with('status', 'Ajout du tutoriel effectué avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutoriel $tutoriel)
    {
        return view('admin.tutoriels.edit', [
            'tutoriel' => $tutoriel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTutorielRequest $request, Tutoriel $tutoriel)
    {
        $tutoriel->update($request->validated());
        return to_route('admin.tutoriel.index')->with('status', 'Modification du tutoriel effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutoriel $tutoriel)
    {
        $tutoriel->delete();
        return to_route('admin.tutoriel.index')->with('status', 'suppression du tutoriel effectuée avec succès');
    }
}
