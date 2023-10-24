<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Http\Requests\StoreCommentaireRequest;
use App\Http\Requests\UpdateCommentaireRequest;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commentaires = Commentaire::all();
        return view('admin.commentaires.index', compact('commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.commentaires.edit', [
            'commentaire' => new Commentaire(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentaireRequest $request)
    {
        $commentaire = Commentaire::create($request->validated());
        return to_route('admin.commentaire.index')->with('status', 'Ajout du commentaire effectué avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        return view('admin.commentaires.edit', [
            'commentaire' => $commentaire,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentaireRequest $request, Commentaire $commentaire)
    {
        $commentaire->update($request->validated());
        return to_route('admin.commentaire.index')->with('status', 'Modification du commentaire effectué  avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return to_route('admin.commentaire.index')->with('status', 'suppression du commentaire effectuée avec succès');
    }
}
