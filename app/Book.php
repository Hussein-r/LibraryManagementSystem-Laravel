<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Book extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function lease()
    {
        return $this->hasMany('App\Lease');
    }
    public function favourite()
    {
        return $this->hasMany('App\Favourite');
    }

    public function rate()
    {
        return $this->hasMany('App\Rate');
    }

    use SoftDeletes;
}
