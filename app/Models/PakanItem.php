<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PakanItem extends Model
{
    use HasFactory;

    #menambahkan fillable
    protected $fillable= [
        'users_id',
        'pakans_id',
        'transactions_id'
    ];


    #menambahkan relation

    public function pakan(){
        return $this->hasOne(Product::class, 'id', 'pakans_id');
    }
}
