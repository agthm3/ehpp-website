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
        'slug'
    ];
}
