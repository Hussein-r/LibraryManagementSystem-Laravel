<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes; 
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
// use Spatie\MediaLibrary\HasMedia\HasMedia;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    // use HasMediaTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_admin','is_active','avatar','username',
    ];


    public function scopeList($query)
    {
        return $query->where('is_admin','1');
    }

    public function scopeListUsers($query)
    {
        return $query->where('is_admin','0');
    }
    
    public function rate()
    {
        return $this->hasMany('App\Rate');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
