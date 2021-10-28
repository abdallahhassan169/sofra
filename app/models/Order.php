<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('details', 'quantity', 'address', 'payment_id', 'addition_id', 'state', 'client_id');

    public function meals()
    {
        return $this->belongsToMany('App\models\Meal');
    }

    public function client()
    {
        return $this->belongsTo('App\models\Client');
    }

    public function payment()
    {
        return $this->belongsTo('App\models\Payment');
    }
    public function restaurant()
    {
        return $this->belongsTo('App\models\Restaurant');
    }

    public function additions()
    {
        return $this->belongsToMany('App\models\Addition');
    }

}
