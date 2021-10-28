<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model 
{

    protected $table = 'sellers';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'city_id', 'area_id', 'password', 'whatsapp', 'contact_phone', 'contact_whatsapp', 'image');

    public function restaurants()
    {
        return $this->hasMany('App\models\Restaurant');
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
        return $this->belongsToMany('App\models\Notification');
    }

}