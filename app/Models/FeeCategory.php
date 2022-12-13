<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeeCategory extends Model
{
    use HasFactory,SoftDeletes;

    public function monthlyFees(){
        return $this->hasMany(FeeCategory::class,'category_id','id');
    }
}
