<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $roles = config('constant.roles');
       foreach($roles as $role){
          $user = Role::updateOrCreate(
            ['role_name' =>  $role],
            ['role_name' => $role]
        );
       }
    }
}
