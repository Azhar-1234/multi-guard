<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];


    //get admin roles
    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
