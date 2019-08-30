<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = '/images/';
    protected $fillable = ['file'];
    
    public function getFileAttribute($photo)
    {
        return $this->uploads . $photo;
    }

    public function user()
    {
        $this->hasOne('App\User');
    }

    public function mediaPlaceholder()
    {
        return "http://placehold.it/500x200";
        // return 'https://via.placeholder.com/400';
    }

    public function userPlaceholder()
    {
        return asset('images/avatar-3.png');
    }
}
