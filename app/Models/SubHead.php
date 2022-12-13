<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class SubHead extends Model
{
    use HasFactory,softDeletes;

    public function childOne(){
        return $this->hasMany(ChildOne::class);
    }

    public function masterAccount(){
        return $this->belongsTo(MasterAccount::class,'master_head_id','id');
    }
}
