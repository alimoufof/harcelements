<?php

namespace App\Http\Controllers;

use App\Models\Harcelement;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user->can('list_publication'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $publications = Publication::with('harcelement')->get();
        return view('admin.publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if(!$user->can('create_publication'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        return view('admin.publications.create', [
            'publication' => new Publication(),
            'harcelements' => Harcelement::pluck('type', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublicationRequest $request)
    {
        $user = Auth::user();
        if(!$user->can('create_publication'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $publication = Publication::create($request->validated());
        return to_route('publication.index')->with('status', 'Ajout de la publication effectué avec succès');
    }

    public function show(Publication $publication)
    {
        $user = Auth::user();
        if(!$user->can('show_publication'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        return view('admin.publications.show', compact('publication')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        $user = Auth::user();
        if(!$user->can('edit_publication'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        return view('admin.publications.edit', [
            'publication' => $publication,
            'harcelements' => Harcelement::pluck('type', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        $user = Auth::user();
        if(!$user->can('edit_publication'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $publication->update($request->validated());
        return to_route('publication.index')->with('status', 'Modification de la publication effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $user = Auth::user();
        if(!$user->can('delete_publication'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $publication->delete();
        return to_route('publication.index')->with('status', 'suppression de la publication effectuée avec succès');
    }
}
