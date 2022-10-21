<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pakan;
use App\Models\User;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [
      'id'
    ];

    #menambahkan relation product dan user
    // public function pakan(){
    //     return $this->hasOne(Pakan::class, 'id', 'pakans_id');
    // }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
        public function pakan(){
        return $this->belongsTo(Pakan::class);
    }
}
