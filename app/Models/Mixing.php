<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Record;

class Mixing extends Model
{
    use HasFactory;

    #menambahkan fillable sesuai ERD
    protected $guarded = [
     'id'
    ];

    #menambahkan relation product dan user
    public function product(){
        return $this->hasOne(Product::class, 'id', 'pakans_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}
