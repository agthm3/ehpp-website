<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\hpp;

class hpprecord extends Model
{
    use HasFactory;
    protected $guarded=[
        'id'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function hpp(){
        return $this->belongsTo(hpp::class, 'user_id', 'id');
    }
}
