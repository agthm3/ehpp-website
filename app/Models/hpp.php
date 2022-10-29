<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\hpprecord;

class hpp extends Model
{
    use HasFactory;

    // protected $guarded = [
    // 'id'
    // ];

    protected $fillable = [
        'user_id',
        'code',
        'bangunan',     
        'pulet',
        'afkir',
        'deplesi',
        'produksi',
        'tenaga',
        'ovk',
        'pln'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function hpp(){
        return $this->belongsTo(hpp::class, 'id', 'user_id');
    }

}
