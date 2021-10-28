<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Bb extends Model 
{

    protected $table = 'meal_order';
    public $timestamps = true;
    protected $fillable = array('meal_id', 'order_id');

}