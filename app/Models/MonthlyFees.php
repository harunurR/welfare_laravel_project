<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthlyFees extends Model
{
    use HasFactory,SoftDeletes;

    // public function monthlyFees() {
    //     return $this->hasMany(MonthlyFees::class);
    // }

    public function feeCategory() {
        return $this->belongsTo(FeeCategory::class,'category_id','id');
    }
}
