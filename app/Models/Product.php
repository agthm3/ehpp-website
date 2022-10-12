<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    #menambahkan Softdeletes
    use HasFactory, SoftDeletes;

    #membuat dan menambahkan fillable 
    protected $fillable = [
        'name', 
        'price', 
        'description', 
        'slug'
    ];
    

    public function galleries(){
        return $this->hasMany(ProductGallery::class, 'products_id', 'id' );
    }
}
