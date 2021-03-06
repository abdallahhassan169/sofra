<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model 
{

    protected $table = 'payments';
    public $timestamps = true;
    protected $fillable = array('name');

    public function orders()
    {
        return $this->hasMany('App\models\Order');
    }

}