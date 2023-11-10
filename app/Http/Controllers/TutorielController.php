<?php

namespace App\Http\Controllers;

use App\Models\Tutoriel;
use App\Http\Requests\StoreTutorielRequest;
use App\Http\Requests\UpdateTutorielRequest;
use App\Models\Harcelement;

class TutorielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutoriels = Tutoriel::with('harcelement')->get();
        return view('admin.tutoriels.index', compact('tutoriels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tutoriels.create', [
            'tutoriel' => new Tutoriel(),
            'harcelements' => Harcelement::pluck('type', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTutorielRequest $request)
    {
        $tutoriel = Tutoriel::create($request->validated());
        return to_route('tutoriel.index')->with('status', 'Ajout effectué avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutoriel $tutoriel)
    {
        return view('admin.tutoriels.edit', [
            'tutoriel' => $tutoriel,
            'harcelements' => Harcelement::pluck('type', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTutorielRequest $request, Tutoriel $tutoriel)
    {
        $tutoriel->update($request->validated());
        return to_route('tutoriel.index')->with('status', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutoriel $tutoriel)
    {
        $tutoriel->delete();
        return to_route('tutoriel.index')->with('status', 'suppression effectuée avec succès');
    }
}
