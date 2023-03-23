<?php

namespace App\Http\Services\Admin;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleService extends Controller
{

    public function index()
    {
        return Role::latest()->get();
    }

    public function store($request)
    {
        $role = Role::create([
            'name' => $request->name,
            'slug' => make_slug( $request->name),
            'permissions' => json_encode($this->formatPermission($request)),
            'status'=> (StatusEnum::true)->status()
        ]);
        $response['status'] = "success";
        $response['message'] = 'Language Created Succesfully';
        $response['data'] = $role;
        return  $response;
    }


    public function formatPermission($request){
        $permissions = [];
        foreach($request->permission as $key=>$permission){
            $permissions[][$key] = array_keys($permission);
        }
 
        return $permissions;
    }

    public function update($request)
    {
        $role = $this->role($request->id);
        $role = $role->update([
            'name' => $request->name,
            'slug' => make_slug( $request->name),
            'permissions' => json_encode($this->formatPermission($request)),
        ]);
        $response['status'] = "success";
        $response['message'] = translate('Roles Updated Succesfully');
        $response['data'] = $role;
        return $response;
    }

    public function role($id){
    return Role::where('id',$id)->first();   
    }

    public function destory($id)
    {
        $response['status'] = 'success';
        $response['message'] = translate('Deleted Successfully');
        try {
            $role = $this->role($id);
            $role->delete();
      
        } catch (\Throwable $th) {
            $response['status'] = 'error';
            $response['message'] = translate('Post Data Error !! Can Not Be Deleted');
        }
        return $response;
    }

    //module permissons
    public  function permissions(){

        $permissions = [
            [
                'admin' => [
                    'view_admin',
                    'update_profile',
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