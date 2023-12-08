<?php

namespace App\Http\Controllers;

use App\Models\Tutoriel;
use App\Models\Harcelement;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTutorielRequest;
use App\Http\Requests\UpdateTutorielRequest;

class TutorielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user->can('list_tutoriel')) 
        {
            dd($user);
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $tutoriels = Tutoriel::with('harcelement')->get();
        return view('admin.tutoriels.index', compact('tutoriels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if(!$user->can('create_tutoriel'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

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
        $user = Auth::user();
        if(!$user->can('create_tutoriel'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $tutoriel = Tutoriel::create($request->validated());
        return to_route('tutoriel.index')->with('status', 'Ajout effectué avec succès');
    }

    public function show(Tutoriel $tutoriel) 
    {
        $user = Auth::user();
        if(!$user->can('show_tutoriel'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        return view('admin.tutoriels.show', compact('tutoriel'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutoriel $tutoriel)
    {
        $user = Auth::user();
        if(!$user->can('edit_tutoriel'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

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
        $user = Auth::user();
        if(!$user->can('edit_tutoriel'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $tutoriel->update($request->validated());
        return to_route('tutoriel.index')->with('status', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutoriel $tutoriel)
    {
        $user = Auth::user();
        if(!$user->can('delete_tutoriel'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $tutoriel->delete();
        return to_route('tutoriel.index')->with('status', 'suppression effectuée avec succès');
    }
}
