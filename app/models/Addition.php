<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model 
{

    protected $table = 'additions';
    public $timestamps = true;
    protected $fillable = array('restaurant_id', 'name');

    public function orders()
    {
        return $this->belongsToMany('App\models\Order');
    }

}