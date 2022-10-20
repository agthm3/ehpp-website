<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MixingItem extends Model
{
    use HasFactory;
        protected $fillable= [
        'users_id',
        'pakans_id',
        'mixings_id'
    ];

    public function pakan(){
        return $this->hasOne(Pakan::class, 'id', 'pakans_id');
    }
}
