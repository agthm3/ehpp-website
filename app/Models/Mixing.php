<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mixing extends Model
{
    use HasFactory;

    #menambahkan fillable sesuai ERD
    protected $fillable = [
        'pakans_id', 
        'users_id'
    ];

    #menambahkan relation product dan user
    public function product(){
        return $this->hasOne(Product::class, 'id', 'pakans_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
