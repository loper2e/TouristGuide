<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favoritelist extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'place_id',
        'user_id',
    ];

    public function place(){
        return $this->belongsTo(place::class);
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
}
