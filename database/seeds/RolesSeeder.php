<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $bb = Role::create([
            'name' => 'bb',
            'permissions' => [
                'aas' => true,
                'bb' => false
            ]
        ]);
    }
}
