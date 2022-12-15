<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class support extends Model
{

    protected $fillable = [ 
        'name', 
        'username', 
        'message', 
        'email',  
        'username',
        'readed',
        ];

    use HasFactory;
}
