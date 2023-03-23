<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(Admin::count() == 0){
              Admin::create([
                'role_id' => '1',
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123123'),
                'status' => '1'
            ]);
        }

    }
}
