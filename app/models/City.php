<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name');

    public function sellers()
    {
        return $this->hasMany('App\models\Seller');
    }
    public function areas()
    {
        return $this->hasMany('App\models\Area');
    }

    public function restaurants()
    {
        return $this->hasMany('App\models\Restaurant');
    }

    public function clients()
    {
        return $this->hasMany('App\models\Client');
    }

}
