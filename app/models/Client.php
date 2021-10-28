<?php

namespace App\models;

use App\Token;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'city_id', 'area_id', 'password');
    protected $hidden = array('password');

    public function comments()
    {
        return $this->hasMany('App\models\Comment');
    }
    public function tokens()
    {
        return $this->hasMany('App\models\Token');
    }

    public function orders()
    {
        return $this->hasMany('App\models\Order');
    }

    public function city()
    {
        return $this->belongsTo('App\models\City');
    }

    public function area()
    {
        return $this->belongsTo('App\models\Area');
    }

    public function notifications()
    {
        return $this->hasMany('App\models\Notification');
    }

}
