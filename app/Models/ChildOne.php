<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ChildOne extends Model
{
    use HasFactory,softDeletes;

    public function childTwo(){
        return $this->hasMany(ChildTwo::class);
    }

    public function subhead(){
        return $this->belongsTo(SubHead::class,'sub_head_id','id');
    }
}
