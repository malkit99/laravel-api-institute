<?php

namespace App\Http\Controllers\Api\Role;

use App\Http\Controllers\Controller;
use App\Http\Resources\AllRolesResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AllRolesController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return AllRolesResource::collection($roles);
    }
}
