<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exports\PermissionExport;

class PermissionController extends Controller
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

    public function Permission()
    {   
        DB::transaction(function() {

            // Création des rôles

            $super_admin = Role::create(['name' => 'super_admin']);
            $admin = Role::create(['name' => 'admin']);
            $user = Role::create(['name' => 'user']);
            $institution = Role::create(['name' => 'institution']);

            // Création d'une permission et affectations aux roles (vice-versa)
            // Harcelement
            $list_harcelement = Permission::create(['name' => 'list_harcelement']);
            $super_admin->givePermissionTo($list_harcelement);
            $list_harcelement->assignRole($super_admin);
            $admin->givePermissionTo($list_harcelement);
            $list_harcelement->assignRole($admin);
            $institution->givePermissionTo($list_harcelement);
            $list_harcelement->assignRole($institution);
            $user->givePermissionTo($list_harcelement);
            $list_harcelement->assignRole($user);

            $create_harcelement = Permission::create(['name' => 'create_harcelement']);
            $super_admin->givePermissionTo($create_harcelement);
            $create_harcelement->assignRole($super_admin);
            $admin->givePermissionTo($create_harcelement);
            $create_harcelement->assignRole($admin);
            $user->givePermissionTo($create_harcelement);
            $create_harcelement->assignRole($user);

            $show_harcelement = Permission::create(['name' => 'show_harcelement']);
            $super_admin->givePermissionTo($show_harcelement);
            $show_harcelement->assignRole($super_admin);
            $admin->givePermissionTo($show_harcelement);
            $show_harcelement->assignRole($admin);
            $institution->givePermissionTo($show_harcelement);
            $show_harcelement->assignRole($institution);
            $user->givePermissionTo($show_harcelement);
            $show_harcelement->assignRole($user);

            $edit_harcelement = Permission::create(['name' => 'edit_harcelement']);
            $super_admin->givePermissionTo($edit_harcelement);
            $edit_harcelement->assignRole($super_admin);
            $admin->givePermissionTo($edit_harcelement);
            $edit_harcelement->assignRole($admin);
            $user->givePermissionTo($edit_harcelement);
            $edit_harcelement->assignRole($user);

            $delete_harcelement = Permission::create(['name' => 'delete_harcelement']);
            $super_admin->givePermissionTo($delete_harcelement);
            $delete_harcelement->assignRole($super_admin);
            $admin->givePermissionTo($delete_harcelement);
            $delete_harcelement->assignRole($admin);
            $user->givePermissionTo($delete_harcelement);
            $delete_harcelement->assignRole($user);

            // Création d'une permission et affectations aux roles (vice-versa)
            // Institution
            $list_institution = Permission::create(['name' => 'list_institution']);
            $super_admin->givePermissionTo($list_institution);
            $list_institution->assignRole($super_admin);
            $admin->givePermissionTo($list_institution);
            $list_institution->assignRole($admin);
            $institution->givePermissionTo($list_institution);
            $list_institution->assignRole($institution);
            $user->givePermissionTo($list_institution);
            $list_institution->assignRole($user);

            $create_institution = Permission::create(['name' => 'create_institution']);
            $super_admin->givePermissionTo($create_institution);
            $create_institution->assignRole($super_admin);
            $admin->givePermissionTo($create_institution);
            $create_institution->assignRole($admin);
            $institution->givePermissionTo($create_institution);
            $create_institution->assignRole($institution);

            $show_institution = Permission::create(['name' => 'show_institution']);
            $super_admin->givePermissionTo($show_institution);
            $show_institution->assignRole($super_admin);
            $admin->givePermissionTo($show_institution);
            $show_institution->assignRole($admin);
            $institution->givePermissionTo($show_institution);
            $show_institution->assignRole($institution);
            $user->givePermissionTo($list_institution);
            $list_institution->assignRole($user);

            $edit_institution = Permission::create(['name' => 'edit_institution']);
            $super_admin->givePermissionTo($edit_institution);
            $edit_institution->assignRole($super_admin);
            $admin->givePermissionTo($edit_institution);
            $edit_institution->assignRole($admin);
            $institution->givePermissionTo($edit_institution);
            $edit_institution->assignRole($institution);

            $delete_institution = Permission::create(['name' => 'delete_institution']);
            $super_admin->givePermissionTo($delete_institution);
            $delete_institution->assignRole($super_admin);
            $admin->givePermissionTo($delete_institution);
            $delete_institution->assignRole($admin);
            $institution->givePermissionTo($delete_institution);
            $delete_institution->assignRole($institution);

            // Création d'une permission et affectations aux roles (vice-versa)
            // Signalement
            $list_signalement = Permission::create(['name' => 'list_signalement']);
            $super_admin->givePermissionTo($list_signalement);
            $list_signalement->assignRole($super_admin);
            $admin->givePermissionTo($list_signalement);
            $list_signalement->assignRole($admin);
            $institution->givePermissionTo($list_signalement);
            $list_signalement->assignRole($institution);

            $create_signalement = Permission::create(['name' => 'create_signalement']);
            $super_admin->givePermissionTo($create_signalement);
            $create_signalement->assignRole($super_admin);
            $admin->givePermissionTo($create_signalement);
            $create_signalement->assignRole($admin);
            $user->givePermissionTo($create_signalement);
            $create_signalement->assignRole($user);

            $show_signalement = Permission::create(['name' => 'show_signalement']);
            $super_admin->givePermissionTo($show_signalement);
            $show_signalement->assignRole($super_admin);
            $admin->givePermissionTo($show_signalement);
            $show_signalement->assignRole($admin);
            $institution->givePermissionTo($show_signalement);
            $show_signalement->assignRole($institution);
            $user->givePermissionTo($list_signalement);
            $list_signalement->assignRole($user);

            $edit_signalement = Permission::create(['name' => 'edit_signalement']);
            $super_admin->givePermissionTo($edit_signalement);
            $edit_signalement->assignRole($super_admin);
            $admin->givePermissionTo($edit_signalement);
            $edit_signalement->assignRole($admin);
            $user->givePermissionTo($edit_signalement);
            $edit_signalement->assignRole($user);

            $delete_signalement = Permission::create(['name' => 'delete_signalement']);
            $super_admin->givePermissionTo($delete_signalement);
            $delete_signalement->assignRole($super_admin);
            $admin->givePermissionTo($delete_signalement);
            $delete_signalement->assignRole($admin);
            $user->givePermissionTo($delete_signalement);
            $delete_signalement->assignRole($user);

            // Création d'une permission et affectations aux roles (vice-versa)
            // Tutoriel
            $list_tutoriel = Permission::create(['name' => 'list_tutoriel']);
            $super_admin->givePermissionTo($list_tutoriel);
            $list_tutoriel->assignRole($super_admin);
            $admin->givePermissionTo($list_tutoriel);
            $list_tutoriel->assignRole($admin);
            $institution->givePermissionTo($list_tutoriel);
            $list_tutoriel->assignRole($institution);
            $user->givePermissionTo($list_tutoriel);
            $list_tutoriel->assignRole($user);

            $create_tutoriel = Permission::create(['name' => 'create_tutoriel']);
            $super_admin->givePermissionTo($create_tutoriel);
            $create_tutoriel->assignRole($super_admin);
            $admin->givePermissionTo($create_tutoriel);
            $create_tutoriel->assignRole($admin);

            $show_tutoriel = Permission::create(['name' => 'show_tutoriel']);
            $super_admin->givePermissionTo($show_tutoriel);
            $show_tutoriel->assignRole($super_admin);
            $admin->givePermissionTo($show_tutoriel);
            $show_tutoriel->assignRole($admin);
            $institution->givePermissionTo($show_tutoriel);
            $show_tutoriel->assignRole($institution);
            $user->givePermissionTo($list_tutoriel);
            $list_tutoriel->assignRole($user);

            $edit_tutoriel = Permission::create(['name' => 'edit_tutoriel']);
            $super_admin->givePermissionTo($edit_tutoriel);
            $edit_tutoriel->assignRole($super_admin);
            $admin->givePermissionTo($edit_tutoriel);
            $edit_tutoriel->assignRole($admin);

            $delete_tutoriel = Permission::create(['name' => 'delete_tutoriel']);
            $super_admin->givePermissionTo($delete_tutoriel);
            $delete_tutoriel->assignRole($super_admin);
            $admin->givePermissionTo($delete_tutoriel);
            $delete_tutoriel->assignRole($admin);

            // Création d'une permission et affectations aux roles (vice-versa)
            // Blog
            $list_blog = Permission::create(['name' => 'list_blog']);
            $super_admin->givePermissionTo($list_blog);
            $list_blog->assignRole($super_admin);
            $admin->givePermissionTo($list_blog);
            $list_blog->assignRole($admin);
            $institution->givePermissionTo($list_blog);
            $list_blog->assignRole($institution);
            $user->givePermissionTo($list_blog);
            $list_blog->assignRole($user);

            $create_blog = Permission::create(['name' => 'create_blog']);
            $super_admin->givePermissionTo($create_blog);
            $create_blog->assignRole($super_admin);
            $admin->givePermissionTo($create_blog);
            $create_blog->assignRole($admin);

            $show_blog = Permission::create(['name' => 'show_blog']);
            $super_admin->givePermissionTo($show_blog);
            $show_blog->assignRole($super_admin);
            $admin->givePermissionTo($show_blog);
            $show_blog->assignRole($admin);
            $institution->givePermissionTo($show_blog);
            $show_blog->assignRole($institution);
            $user->givePermissionTo($list_blog);
            $list_blog->assignRole($user);

            $edit_blog = Permission::create(['name' => 'edit_blog']);
            $super_admin->givePermissionTo($edit_blog);
            $edit_blog->assignRole($super_admin);
            $admin->givePermissionTo($edit_blog);
            $edit_blog->assignRole($admin);

            $delete_blog = Permission::create(['name' => 'delete_blog']);
            $super_admin->givePermissionTo($delete_blog);
            $delete_blog->assignRole($super_admin);
            $admin->givePermissionTo($delete_blog);
            $delete_blog->assignRole($admin);

            // Création d'une permission et affectations aux roles (vice-versa)
            // Publication
            $list_publication = Permission::create(['name' => 'list_publication']);
            $super_admin->givePermissionTo($list_publication);
            $list_publication->assignRole($super_admin);
            $admin->givePermissionTo($list_publication);
            $list_publication->assignRole($admin);
            $institution->givePermissionTo($list_publication);
            $list_publication->assignRole($institution);
            $user->givePermissionTo($list_publication);
            $list_publication->assignRole($user);

            $create_publication = Permission::create(['name' => 'create_publication']);
            $super_admin->givePermissionTo($create_publication);
            $create_publication->assignRole($super_admin);
            $admin->givePermissionTo($create_publication);
            $create_publication->assignRole($admin);

            $show_publication = Permission::create(['name' => 'show_publication']);
            $super_admin->givePermissionTo($show_publication);
            $show_publication->assignRole($super_admin);
            $admin->givePermissionTo($show_publication);
            $show_publication->assignRole($admin);
            $institution->givePermissionTo($show_publication);
            $show_publication->assignRole($institution);
            $user->givePermissionTo($list_publication);
            $list_publication->assignRole($user);

            $edit_publication = Permission::create(['name' => 'edit_publication']);
            $super_admin->givePermissionTo($edit_publication);
            $edit_publication->assignRole($super_admin);
            $admin->givePermissionTo($edit_publication);
            $edit_publication->assignRole($admin);

            $delete_publication = Permission::create(['name' => 'delete_publication']);
            $super_admin->givePermissionTo($delete_publication);
            $delete_publication->assignRole($super_admin);
            $admin->givePermissionTo($delete_publication);
            $delete_publication->assignRole($admin);

             // Commentaire
             $list_commentaire = Permission::create(['name' => 'list_commentaire']);
             $super_admin->givePermissionTo($list_commentaire);
             $list_commentaire->assignRole($super_admin);
             $admin->givePermissionTo($list_commentaire);
             $list_commentaire->assignRole($admin);
             $institution->givePermissionTo($list_commentaire);
             $list_commentaire->assignRole($institution);
             $user->givePermissionTo($list_commentaire);
             $list_commentaire->assignRole($user);
 
             $create_commentaire = Permission::create(['name' => 'create_commentaire']);
             $super_admin->givePermissionTo($create_commentaire);
             $create_commentaire->assignRole($super_admin);
             $admin->givePermissionTo($create_commentaire);
             $create_commentaire->assignRole($admin);
             $institution->givePermissionTo($create_commentaire);
             $create_commentaire->assignRole($institution);
             $user->givePermissionTo($create_commentaire);
             $create_commentaire->assignRole($user);
 
             $show_commentaire = Permission::create(['name' => 'show_commentaire']);
             $super_admin->givePermissionTo($show_commentaire);
             $show_commentaire->assignRole($super_admin);
             $admin->givePermissionTo($show_commentaire);
             $show_commentaire->assignRole($admin);
             $institution->givePermissionTo($show_commentaire);
             $show_commentaire->assignRole($institution);
             $user->givePermissionTo($list_commentaire);
             $list_commentaire->assignRole($user);
 
             $edit_commentaire = Permission::create(['name' => 'edit_commentaire']);
             $super_admin->givePermissionTo($edit_commentaire);
             $edit_commentaire->assignRole($super_admin);
             $admin->givePermissionTo($edit_commentaire);
             $edit_commentaire->assignRole($admin);
             $institution->givePermissionTo($create_commentaire);
             $create_commentaire->assignRole($institution);
             $user->givePermissionTo($create_commentaire);
             $create_commentaire->assignRole($user);
 
             $delete_commentaire = Permission::create(['name' => 'delete_commentaire']);
             $super_admin->givePermissionTo($delete_commentaire);
             $delete_commentaire->assignRole($super_admin);
             $admin->givePermissionTo($delete_commentaire);
             $delete_commentaire->assignRole($admin);
             $institution->givePermissionTo($create_commentaire);
             $create_commentaire->assignRole($institution);
             $user->givePermissionTo($create_commentaire);
             $create_commentaire->assignRole($user);

            // User
            $list_user = Permission::create(['name' => 'list_user']);
            $super_admin->givePermissionTo($list_user);
            $list_user->assignRole($super_admin);
            $admin->givePermissionTo($list_user);
            $list_user->assignRole($admin);

            $create_user = Permission::create(['name' => 'create_user']);
            $super_admin->givePermissionTo($create_user);
            $create_user->assignRole($super_admin);
            $admin->givePermissionTo($create_user);
            $create_user->assignRole($admin);

            $show_user = Permission::create(['name' => 'show_user']);
            $super_admin->givePermissionTo($show_user);
            $show_user->assignRole($super_admin);
            $admin->givePermissionTo($show_user);
            $show_user->assignRole($admin);

            $edit_user = Permission::create(['name' => 'edit_user']);
            $super_admin->givePermissionTo($edit_user);
            $edit_user->assignRole($super_admin);
            $admin->givePermissionTo($edit_user);
            $edit_user->assignRole($admin);

            $delete_user = Permission::create(['name' => 'delete_user']);
            $super_admin->givePermissionTo($delete_user);
            $delete_user->assignRole($super_admin);
            $admin->givePermissionTo($delete_user);
            $delete_user->assignRole($admin);

             // Role
             $list_role = Permission::create(['name' => 'list_role']);
             $super_admin->givePermissionTo($list_role);
             $list_role->assignRole($super_admin);
             $admin->givePermissionTo($list_role);
             $list_role->assignRole($admin);
 
             $create_role = Permission::create(['name' => 'create_role']);
             $super_admin->givePermissionTo($create_role);
             $create_role->assignRole($super_admin);
             $admin->givePermissionTo($create_role);
             $create_role->assignRole($admin);
 
             $show_role = Permission::create(['name' => 'show_role']);
             $super_admin->givePermissionTo($show_role);
             $show_role->assignRole($super_admin);
             $admin->givePermissionTo($show_role);
             $show_role->assignRole($admin);
 
             $edit_role = Permission::create(['name' => 'edit_role']);
             $super_admin->givePermissionTo($edit_role);
             $edit_role->assignRole($super_admin);
             $admin->givePermissionTo($edit_role);
             $edit_role->assignRole($admin);
 
             $delete_role = Permission::create(['name' => 'delete_role']);
             $super_admin->givePermissionTo($delete_role);
             $delete_role->assignRole($super_admin);
             $admin->givePermissionTo($delete_role);
             $delete_role->assignRole($admin);
 
             // Permission
             $list_permission = Permission::create(['name' => 'list_permission']);
             $super_admin->givePermissionTo($list_permission);
             $list_permission->assignRole($super_admin);
             $admin->givePermissionTo($list_permission);
             $list_permission->assignRole($admin);
 
             $create_permission = Permission::create(['name' => 'create_permission']);
             $super_admin->givePermissionTo($create_permission);
             $create_permission->assignRole($super_admin);
 
             $show_permission = Permission::create(['name' => 'show_permission']);
             $super_admin->givePermissionTo($show_permission);
             $show_permission->assignRole($super_admin);
             $admin->givePermissionTo($show_permission);
             $show_permission->assignRole($admin);
 
             $edit_permission = Permission::create(['name' => 'edit_permission']);
             $super_admin->givePermissionTo($edit_permission);
             $edit_permission->assignRole($super_admin);
 
             $delete_permission = Permission::create(['name' => 'delete_permission']);
             $super_admin->givePermissionTo($delete_permission);
             $delete_permission->assignRole($super_admin);

            $user = User::where('email', 'alimfof76@gmail.com')->first();
            if (!is_null($user)) {
                $user->assignRole($super_admin);
            }
        });
        
        return response()->json('success');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user->can('list_permission'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        //On récupère tous les permissions
        $permissions = Permission::whereNotIn('name', ['super_admin'])->paginate(10);

        // On transmet les permissions à la vue
        return view("permissions.index", compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        dd($user);
        if(!$user->can('create_permission'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        //On récupère tous les roles
        $roles = Role::whereNotIn('name', ['super_admin'])->get();

        return view("permissions.create", compact('roles'));
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
        if(!$user->can('store_permission'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $validatedData = $this->validate($request, [
            'name' => 'required|string|max:255|unique:permissions',
            'guard_name' => 'required|string|max:255',
            'roles' => 'required|array',
            'roles.*' => 'string',
        ]);

        DB::transaction(function() use($validatedData) {
            $permission = Permission::create(['name' => $validatedData['name'], 'guard_name' => $validatedData['guard_name']]);
            $permission->roles()->sync($validatedData['roles']);
            $super_admin = Role::findByName('super_admin');
            $super_admin->givePermissionTo($permission);
            $permission->assignRole($super_admin);
        });

        return redirect(route('permissions.index'))->with('success', 'Permission ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        $user = Auth::user();
        if(!$user->can('show_permission'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $permission = Permission::find($permission->id);
        $permission_roles = Permission::with('roles')->get();
        //On récupère tous les roles
        $roles = Role::whereNotIn('name', ['super_admin'])->get();

        return view('permissions.show', compact('permission', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $user = Auth::user();
        if(!$user->can('edit_permission'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        //On récupère tous les roles
        $roles = Role::whereNotIn('name', ['super_admin'])->get();

        $permission = Permission::findOrFail($permission->id);

        return view('permissions.edit', compact('permission', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $user = Auth::user();
        if(!$user->can('update_permission'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        $validatedData = $this->validate($request, [
            'name' => 'required|string|max:255',
            'guard_name' => 'required|string|max:255',
            'roles' => 'required|array',
            'roles.*' => 'string',
        ]);

        DB::transaction(function() use($validatedData, $permission) {
            Permission::whereId($permission->id)->update(['name' => $validatedData['name'], 'guard_name' => $validatedData['guard_name']]);
            $permission->roles()->sync($validatedData['roles']);
            $super_admin = Role::findByName('rosuperot_admin');
            $super_admin->givePermissionTo($permission);
            $permission->assignRole($rosuperot_admin);
        });

        return redirect(route('permissions.show', $permission->id))->with('success', 'Permission ajouté avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $user = Auth::user();
        if(!$user->can('delete_permission'))
        {
            return redirect(route('home'))->with('info', 'Vous n\'avez pas l\'autorisation requise pour accéder à cette ressource');
        }

        Permission::destroy($permission->id);

        return redirect(route('permissions.index'))->with('success', 'Permission ajouté avec succès');
    }

    public function export($id = null) 
    {
        if (is_null($id)) {
            return new PermissionExport();
        }
        return new PermissionExport($id);
    }
}
