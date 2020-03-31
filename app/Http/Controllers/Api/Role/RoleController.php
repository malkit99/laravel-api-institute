<?php

namespace App\Http\Controllers\Api\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Resources\RoleResource;
use App\Http\Resources\AllRolesResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index(Role $role)
    {
        $role = $role->all();
        return RoleResource::collection($role);
    }



    public function store(RoleStoreRequest $request)
    {
        // return $request->all();
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        $permissions = $request->input('permissions') ? $request->input('permissions') : [];
        $role->givePermissionTo($permissions);
        return new RoleResource($role);
    }




    public function permissionById(Role $role)
    {
        return new RoleResource($role);
    }


    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->update();
        $permissions = $request->input('permissions') ? $request->input('permissions') : [];
        $role->syncPermissions($permissions);
        return new RoleResource($role);
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(['data' => 'Delete Role']);
    }
}
