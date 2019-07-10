<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\RoleDao;

class AdminController extends Controller
{
    protected $roleDao;

    //
    public function __construct(RoleDao $roleDao)
    {
        $this->roleDao = $roleDao;
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin/user-list', ['users' => $users]);
    }

    public function updatePermission(Request $request)
    {
        if (isset($request->permission) && isset($request->userId)) {
            $userId = $request->userId;
            $permission = $request->permission;
            $valid = $request->valid;
            
           $this->updateUserPermission($userId, $permission, $valid);
        //    return "success";
            return var_dump($this->roleDao->getAll());
         }
         
         return "failed";
    }

    public function updateUserPermission($userId, $permission, $valid) {
        $user = User::find($userId);
        $role = $user->roles[0];

        if (!isset($role->permissions[$permission])) {
            $temp = $role->permissions;
            $temp[$permission] =(bool) $valid;
            $role->permissions = $temp;

            $role->save();
        }
    }

}
