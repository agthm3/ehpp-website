<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pakan extends Model
{
    use HasFactory, SoftDeletes;
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

}
