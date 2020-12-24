<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class creationOfRoles extends Controller
{
    //
    public function createRolesForUsers(){
        $role1 = Role::create(['name' => 'client']);
        $role2 = Role::create(['name' => 'agent']);
        $role2 = Role::create(['name' => 'admin']);

        return response("Successfully Added Roles.",200);
    }
}
