<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    // get updated by info
    public function scopeActive($q){
        return $q->where('status',(StatusEnum::true)->status());
    }
    
}
