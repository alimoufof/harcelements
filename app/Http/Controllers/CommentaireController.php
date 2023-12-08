<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCommentaireRequest;
use App\Http\Requests\UpdateCommentaireRequest;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user->can('list_commentaire'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $commentaires = Commentaire::with('publication')->get();
        return view('admin.commentaires.index', compact('commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if(!$user->can('create_commentaire'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

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
        $user = Auth::user();
        if(!$user->can('create_commentaire'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $commentaire = Commentaire::create($request->validated());
        return to_route('commentaire.index')->with('status', 'Ajout du commentaire effectué avec succès');
    }

    public function show(Commentaire $commentaire)
    {
        $user = Auth::user();
        if(!$user->can('show_commentaire'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        return view('admin.commentaires.show', compact('commentaire')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        $user = Auth::user();
        if(!$user->can('edit_commentaire'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

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
        $user = Auth::user();
        if(!$user->can('edit_commentaire'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $commentaire->update($request->validated());
        return to_route('commentaire.index')->with('status', 'Modification du commentaire effectuée  avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        $user = Auth::user();
        if(!$user->can('delete_commentaire'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $commentaire->delete();
        return to_route('commentaire.index')->with('status', 'suppression du commentaire effectuée avec succès');
    }
}
