<?php

namespace Database\Seeders;

use App\Http\Services\RoleService;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role =  Role::where('name','SuperAdmin')->first();
        $roleService = new RoleService();
        if(!$role){
            $role = Role::create([
                'id'=>1,
                'name' =>'SuperAdmin',
                'slug'=> 'SuperAdmin'
            ]);
        }
        $role->permissions =  json_encode($roleService->permissions());
        $role->status = '1';
        $role->save();
    }



}
