<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientInfo extends Model
{
    use HasFactory;
    public function payment(){
        return $this->hasMany(ClientPayment::class,'client_id','id');
    }
}
