<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    protected $fillable = [ 
    'place_id', 
    'user_id', 
    'content', 
    'username', 
    'country', 
    'userimage',
    'rate', 
    ];

    public function place(){
        return $this->belongsTo(place::class);
    }
}
