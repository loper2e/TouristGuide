<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class place extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'cityname',
        'type',
        'mainimage',
        'image1',
        'image2',
        'image3',
        'details',
        'open_time',
        'close_time',
        'user_name',
    ];

    public function review(){
        return $this->hasMany(review::class);
    }
    public function favorite(){
        return $this->hasMany(favoritelist::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($review) {
            review::where('place_id', $review->id)->delete();
            favoritelist::where('place_id', $review->id)->delete();
        });
    }

}
