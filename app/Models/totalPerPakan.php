<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pakan;

class totalPerPakan extends Model
{
    use HasFactory;

    protected $guarded=[
        'id', 
        
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pakan(){
        return $this->belongsTo(Pakan::class);
    }
}
