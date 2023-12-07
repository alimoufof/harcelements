<?php

namespace App\Http\Controllers;

use App\Models\Signalement;
use App\Http\Requests\StoreSignalementRequest;
use App\Http\Requests\UpdateSignalementRequest;
use App\Models\Harcelement;

class SignalementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signalements = Signalement::with('harcelement')->paginate(2);
        return view('admin.signalements.index', compact('signalements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.signalements.create', [
            'signalement' => new Signalement(),
            'harcelements' => Harcelement::pluck('type', 'id'),
        ]);
        
    }

    public function show(Signalement $signalement)
    {
        return view('admin.signalements.show', compact('signalement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSignalementRequest $request)
    {
        $signalement = Signalement::create($request->validated());
        return to_route('signalement.index')->with('status', 'Ajout effectué avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Signalement $signalement)
    {
        return view('admin.signalements.edit', [
            'signalement' => $signalement,
            'harcelements' => Harcelement::pluck('type', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSignalementRequest $request, Signalement $signalement)
    {
        $signalement->update($request->validated());
        return to_route('signalement.index')->with('status', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Signalement $signalement)
    {
        $signalement->delete();
        return to_route('signalement.index')->with('status', 'suppression effectuée avec succès');
    }
}
