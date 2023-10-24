<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::all();
        return view('admin.publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.publications.edit', [
            'publication' => new Publication(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublicationRequest $request)
    {
        $publication = Publication::create($request->validated());
        return to_route('admin.publication.index')->with('status', 'Ajout de la publication '. $request->titre . ' effectué avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        return view('admin.publications.edit', [
            'publication' => $publication,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        $publication->update($request->validated());
        return to_route('admin.publication.index')->with('status', 'Modification de la publication '. $request->titre . ' effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return to_route('admin.publication.index')->with('status', 'suppression de tutoriel '. $publication->titre . ' effectuée avec succès');
    }
}
