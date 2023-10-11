<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);

        return view('roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create([
            'name' => $validated['name'],
        ]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $role->id)
            ->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role->name = $validated['name'];
        $role->save();

        $role->syncPermissions($validated['permission']);

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
