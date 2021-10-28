<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Cc extends Model 
{

    protected $table = 'restaurant_type';
    public $timestamps = true;
    protected $fillable = array('restaurant_id', 'type_id');

}