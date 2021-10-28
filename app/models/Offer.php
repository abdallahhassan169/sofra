<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $table = 'offers';
    public $timestamps = true;
    protected $fillable = array('restaurant_id', 'text', 'date_from', 'date_to', 'meal_id');

    public function meal()
    {
        return $this->belongsTo('App\models\Meal');
    }
    public function restaurant()
    {
        return $this->belongsTO('App\models\Restaurant');
    }
}
