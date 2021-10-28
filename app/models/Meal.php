<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{

    protected $table = 'meals';
    public $timestamps = true;
    protected $fillable = array('name', 'price', 'offer_price', 'evalution', 'time', 'image');

    public function restaurant()
    {
        return $this->belongsTo('App\models\Restaurant');
    }

    public function orders()
    {
        return $this->belongsToMany('App\models\Order');
    }

    public function offer()
    {
        return $this->hasOne('App\models\Offer');
    }

}
