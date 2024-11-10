<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function role()
    {
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('pages.dashboard.role.role', [
            'permissions' => $permissions,
            'roles' => $roles,
            'users' => $users,
        ]);
    }

    public function role_store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|unique:roles,name',
            'permission' => 'required|array|min:1', // Ensure at least one permission is selected
        ]);

        // Create the role
        $role = Role::create(['name' => $request->role_name]);

        // Fetch the permissions by ID and get their names
        $permissions = Permission::whereIn('id', $request->permission)->pluck('name');

        // Assign permissions by name
        $role->givePermissionTo($permissions);

        return back()->with('success', 'Role created successfully');
    }

    public function assign_role(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
        ]);

        $user = User::find($request->user_id);
        $user->assignRole($request->role_id);

        return back();
    }

    public function remove_role($user_id)
    {
        $user = User::find($user_id);
        $user->syncPermissions([]);
        $user->syncRoles([]);
        return back();
    }

    public function role_delete($role_id)
    {
        $role = Role::find($role_id);
        $role->syncPermissions([]);
        $role->delete();
        return back();
    }

    public function role_edit(Request $request)
    {
        $permissions = Permission::all();
        $role = Role::with('permissions')->find($request->role_id);
        $data = $role->permissions()->pluck('id')->toArray();


        return view('pages.dashboard.role.edit_role', [
            'permissions' => $permissions,
            'role' => $role,
            'data' => $data,
        ]);
    }

    public function role_update(Request $request)
    {
        $request->validate([
            'role_name' => "required|unique:roles,name, $request->role_id",
        ]);

        $role = Role::find($request->role_id);

        $role->syncPermissions($request->permission);

        return back();
    }
}
