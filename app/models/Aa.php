<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Aa extends Model 
{

    protected $table = 'addition_order';
    public $timestamps = true;
    protected $fillable = array('addition_id', 'order_id');

}