<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class MasterAccount extends Model
{
    use HasFactory,softDeletes;

    public function subhead(){
        return $this->hasMany(SubHead::class,'master_head_id','id');
    }
}
