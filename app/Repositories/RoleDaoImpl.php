<?php

namespace App\Repositories;

use App\Role;

class RoleDaoImpl implements RoleDao {

    public function getAll()
    {
        return Role::all();
    }

    public function getRoleById($id)
    {
        return Role::find($id);
    }
}