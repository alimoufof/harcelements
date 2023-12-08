<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Institution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user->can('list_institution'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $institutions = Institution::all();
        return view('admin.institutions.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if(!$user->can('create_institution'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        return view('admin.institutions.create', [
            'institution' => new Institution(),
        ]);
    }

    public function show(Institution $institution)
    {
        $user = Auth::user();
        if(!$user->can('show_institution'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        return view('admin.institutions.show', [
            'institution' => $institution,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstitutionRequest $request)
    {
        $user = Auth::user();
        if(!$user->can('create_institution'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $data = $request->validated();

        if($request->hasFile('image'))
        {
            $imagePath = $request->file('image')->store('institution_images', 'public');
            $data['image'] = $imagePath;
        }

        Institution::create($data);

        return to_route('institution.index')->with('status', "Ajout de l'institution effectuée avec succès");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institution $institution)
    {
        $user = Auth::user();
        if(!$user->can('edit_institution'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        // dd($institution->type);
        return view('admin.institutions.edit', [
            'institution' => $institution,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstitutionRequest $request, Institution $institution)
    {
        $user = Auth::user();
        if(!$user->can('edit_institution'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $data = $request->validated();

        if($request->hasFile('image'))
        {
            if($institution->image)
            {
                Storage::disk('public')->delete($institution->image);
            }
            
            $imagePath = $request->file('image')->store('institution_images', 'public');
            $data['image'] = $imagePath;
        }
        $institution->update($data);
        return to_route('institution.index')->with('status', "Modification de l'institution effectuée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        $user = Auth::user();
        if(!$user->can('delete_institution'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }
        if($institution->image)
        {
            Storage::disk('public')->delete($institution->image);
        }

        $institution->delete();
        return to_route('institution.index')->with('status', "Suppression de l'institution effectuée avec succès");
    }
}
