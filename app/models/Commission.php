<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model 
{

    protected $table = 'commissions';
    public $timestamps = true;
    protected $fillable = array('restaurant_sells', 'app_commision', 'payed', 'stayed');

    public function restaurant()
    {
        return $this->belongsTo('App\models\Restaurant');
    }

}