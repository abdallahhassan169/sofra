<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    protected $table = 'areas';
    public $timestamps = true;
    protected $fillable = array('city_id', 'name');

    public function clients()
    {
        return $this->hasMany('App\models\Client');
    }

    public function sellers()
    {
        return $this->belongsToMany('App\models\Seller');
    }

    public function restaurants()
    {
        return $this->hasMany('App\models\Restaurant');
    }
    public function city(){
        return $this->belongsTo('App\models\City');

    }
}
