<?php

namespace App\Http\Services;

use App\Http\Controllers\Controller;

class RoleService extends Controller
{

    //module permissons
    public  function permissions(){

        $permissions = [
            [
                'admin' => [
                    'view_admin',
                    'create_admin',
                    'update_admin',
                    'delete_admin',
                ]
            ],

            [
                'role' => [
                    'view_roles',
                    'create_roles',
                    'update_roles',
                    'delete_roles',
                ]
            ],
        
            [
                'home' => [
                    'view_home',
                ]
            ],
        

        ];
        return $permissions;
    }
    
  
}