<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pakan extends Model
{
    use HasFactory;
        protected $fillable = [
             
        'name', 
        'price', 
        'description', 
        'protein', 
        'lemak',
        'serat',
        'energi',
        'ca',
        'p',
        'mixing',
        'slug',
        'gprotein',
        'glemak',
        'gkasar',
        'generg',
        'gca',
        'gp'
    ];
    public function galleries(){
        return $this->hasMany(PakanGallery::class, 'pakans_id', 'id' );
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }
      public function total_semua_pakans(){
        return $this->hasOne(totalSemuaPakan::class);
    }
}
