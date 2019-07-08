<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{

    //public function &__get ( $index ){return $this->permissions[$index];}

    //
    protected $fillable = [
        'name', 'permissions'
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'role_users');
    }

    public function hasAccess(array $permissions) : bool {
        foreach($permissions as $permission) {
            if($this->hasPermission($permission)) {
                return true;
            }
        }
        return false;
    }

    public function hasPermission(string $permission) : bool {
        return $this->permissions[$permission] ?? false;
    }
}
