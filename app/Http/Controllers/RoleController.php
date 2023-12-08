<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exports\RoleExport;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user->can('list_role'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        //On récupère tous les roles
        // $roles = Role::whereNotIn('name', ['root_admin'])->get();
        $roles = Role::all();       

        // On transmet les roles à la vue
        return view("roles.index", compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if(!$user->can('create_role'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        //On récupère tous les permissions
        $perms = Permission::all('id', 'name');

        $permissions = [];
        $category = ["commande", "livraison", "facturation", "transporteur", "vehicule", "driver", "user", "role", "permission", "configuration", "client", "destinataire"];

        foreach ($perms as $perm) {
            $mot = $perm->name;
            for ($i=0; $i < sizeof($category); $i++) { 
                $sousMot = $category[$i];
                if (strpos($mot, $sousMot) !== false) {
                    $permissions[$sousMot][] = $perm;
                }
            }
        }

        return view("roles.create", compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if(!$user->can('store_role'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $validatedData = $this->validate($request, [
            'name' => 'required|string|max:255|unique:roles',
            'guard_name' => 'required|string|max:255',
            'permissions' => 'required|array',
            'permissions.*' => 'string',
        ]);

        DB::transaction(function() use($validatedData) {
            $role = Role::create(['name' => $validatedData['name'], 'guard_name' => $validatedData['guard_name']]);
            $role->permissions()->sync($validatedData['permissions']);
        });

        return redirect(route('roles.index'))->with('success', 'Role ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $user = Auth::user();
        if(!$user->can('show_role'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $role = Role::find($role->id);
        $perms = Role::findByName($role->name)->permissions;

        $permissions = [];
        $category = ["commande", "livraison", "facturation", "transporteur", "vehicule", "driver", "user", "role", "permission", "configuration", "client", "destinataire"];

        foreach ($perms as $perm) {
            $mot = $perm->name;
            for ($i=0; $i < sizeof($category); $i++) { 
                $sousMot = $category[$i];
                if (strpos($mot, $sousMot) !== false) {
                    $permissions[$sousMot][] = $perm;
                }
            }
        }

        return view('roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $user = Auth::user();
        if(!$user->can('edit_role'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $role = Role::findOrFail($role->id);

        $perms = Permission::all('id', 'name');

        $permissions = [];
        $category = ["commande", "livraison", "facturation", "transporteur", "vehicule", "driver", "user", "role", "permission", "configuration", "client", "destinataire"];

        foreach ($perms as $perm) {
            $mot = $perm->name;
            for ($i=0; $i < sizeof($category); $i++) { 
                $sousMot = $category[$i];
                if (strpos($mot, $sousMot) !== false) {
                    $permissions[$sousMot][] = $perm;
                }
            }
        }

        return view("roles.edit", compact('permissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $user = Auth::user();
        if(!$user->can('update_role'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $validatedData = $this->validate($request, [
            'name' => 'required|string|max:255',
            'guard_name' => 'required|string|max:255',
            'permissions' => 'required|array',
            'permissions.*' => 'string',
        ]);

        DB::transaction(function() use($validatedData, $role) {
            Role::whereId($role->id)->update(['name' => $validatedData['name'], 'guard_name' => $validatedData['guard_name']]);
            $role->permissions()->sync($validatedData['permissions']);
        });

        return redirect(route('roles.show', $role->id))->with('success', 'Role ajouté avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $user = Auth::user();
        if(!$user->can('delete_role'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        Role::destroy($role->id);

        return redirect(route('roles.index'))->with('success', 'Role ajouté avec succès');
    }

    public function export($id = null) 
    {
        if (is_null($id)) {
            return new RoleExport();
        }
        return new RoleExport($id);
    }
}
