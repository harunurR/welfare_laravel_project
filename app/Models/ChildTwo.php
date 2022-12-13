<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ChildTwo extends Model
{
    use HasFactory,softDeletes;

    public function childOne(){
        return $this->belongsTo(ChildOne::class,'child_one_id','id');
    }
}
