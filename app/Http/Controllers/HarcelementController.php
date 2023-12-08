<?php

namespace App\Http\Controllers;

use App\Models\Harcelement;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreHarcelementRequest;
use App\Http\Requests\UpdateHarcelementRequest;

class HarcelementController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user->can('list_harcelement'))
        {
            // dd($user);
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }
        
        $harcelements = Harcelement::all();
        return view('admin.harcelements.index', compact('harcelements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if(!$user->can('create_harcelement'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        return view('admin.harcelements.create', [
            'harcelement' => new Harcelement(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHarcelementRequest $request)
    {
        $user = Auth::user();
        if(!$user->can('create_harcelement'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $harcelement = Harcelement::create($request->validated());
        return to_route('harcelement.index')->with('status', 'Ajout effectué avec succès');
    }

    public function show(Harcelement $harcelement)
    {
        return view('admin.harcelements.show', compact('harcelement'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Harcelement $harcelement)
    {
        $user = Auth::user();
        if(!$user->can('edit_harcelement'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        return view('admin.harcelements.edit', [
            'harcelement' => $harcelement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHarcelementRequest $request, Harcelement $harcelement)
    {
        $user = Auth::user();
        if(!$user->can('edit_harcelement'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $harcelement->update($request->validated());
        return to_route('harcelement.index')->with('status', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.bl
     */
    public function destroy(Harcelement $harcelement)
    {
        $user = Auth::user();
        if(!$user->can('delete_harcelement'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $harcelement->delete();
        return to_route('harcelement.index')->with('status', 'Suppression effectuée avec succès');
    }
}
