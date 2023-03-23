<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\AdminService;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\RolesRequest;
use App\Http\Services\Admin\RoleService;
use App\Models\Role;

class AdminController extends Controller
{
    public $adminService;
    public $roleService;

    public function __construct()
    {
        $this->adminService = new AdminService();
        $this->roleService = new RoleService();
        $this->middleware(['permissions:view_admin'])->only('index');
        $this->middleware(['permissions:create_roles'])->only('create','store');
        $this->middleware(['permissions:update_roles'])->only('update','edit','statusUpdate');
        $this->middleware(['permissions:delete_roles'])->only('destroy');
    }
   //admin dashboard
   public function index()
   { 
        return view('admin.dashboard', [
            'roles' =>   $this->roleService->index(),
        ]);
   }
   public function store(AdminRequest $request)
   {
       $response = $this->adminService->store($request);
       
       return back()->with($response['status'],$response['message']);
   }

   //create a role
//    public function create()
//    {
//        return view('admin.roles.create', [
//            'permissions' => $this->roleService->permissions(),
//        ]);
//    }

//    //store a role
//    public function store(RolesRequest $request)
//    {
//        $response = $this->roleService->store($request);
//        return back()->with($response['status'],$response['message']);
//    }

//    //edit a role
//    public function edit($id)
//    {
//        return view('admin.roles.edit', [
//            'permissions' =>   $this->roleService->permissions(),
//            'role' =>   $this->roleService->role($id),
//        ]);
//    }
//    //update a role
//    public function update(RolesRequest $request)
//    {
//        $response = $this->roleService->update($request);
//        return back()->with($response['status'],$response['message']);
//    }

//    //status update 
//    public function statusUpdate(Request $request){
//        $request->validate([
//            'data.id'=>'required|exists:roles,id'
//        ],[
//            'data.id.required'=>'The Id Field Is Required'
//        ]);
//        $role = Role::where('id',$request->data['id'])->first();
//        $response = update_status($role->id,'Role',$request->data['status']);
//        $response['reload'] = true;
//        return json_encode([$response]);
//    }


//    // destory a role
//    public function destroy($id)
//    {
//        $response = $this->roleService->destory($id);
//        return back()->with( $response['status'],$response['message']);
//    }

}
