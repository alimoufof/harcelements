<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Http\Requests\StoreCommentaireRequest;
use App\Http\Requests\UpdateCommentaireRequest;
use App\Models\Publication;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commentaires = Commentaire::with('publication')->get();
        return view('admin.commentaires.index', compact('commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.commentaires.create', [
            'commentaire' => new Commentaire(),
            'publications' => Publication::pluck('type', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentaireRequest $request)
    {
        $commentaire = Commentaire::create($request->validated());
        return to_route('commentaire.index')->with('status', 'Ajout du commentaire effectué avec succès');
    }

    public function show(Commentaire $commentaire)
    {
        return view('admin.commentaires.show', compact('commentaire')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        return view('admin.commentaires.edit', [
            'commentaire' => $commentaire,
            'publications' => Publication::pluck('type', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentaireRequest $request, Commentaire $commentaire)
    {
        $commentaire->update($request->validated());
        return to_route('commentaire.index')->with('status', 'Modification du commentaire effectuée  avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return to_route('commentaire.index')->with('status', 'suppression du commentaire effectuée avec succès');
    }
}
