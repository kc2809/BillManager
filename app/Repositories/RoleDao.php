<?php

namespace App\Repositories;

interface RoleDao {
    public function getAll();

    public function getRoleById($id);
}