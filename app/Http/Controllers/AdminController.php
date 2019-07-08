<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
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
           return "success";
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
