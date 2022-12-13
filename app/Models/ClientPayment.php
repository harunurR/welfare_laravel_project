<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPayment extends Model
{
    use HasFactory;
    public function client(){
        return $this->belongsTo(ClientInfo::class,'client_id','id');
    }
    public function project(){
        return $this->belongsTo(ProjectInfo::class,'project_info_id','id');
    }
}
