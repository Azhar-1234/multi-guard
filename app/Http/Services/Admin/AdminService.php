<?php

namespace App\Http\Services\Admin;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminService extends Controller
{

    public function store($request)
    {
        
        $admin = Admin::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status'=> (StatusEnum::true)->status()
        ]);
        $response['status'] = "success";
        $response['message'] = 'user Created Succesfully';
        $response['data'] = $admin;
        return  $response;
    }

}