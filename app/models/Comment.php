<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model 
{

    protected $table = 'comments';
    public $timestamps = true;
    protected $fillable = array('restaurant_id', 'client_id', 'text');

    public function restaurant()
    {
        return $this->belongsTo('App\models\Restaurant');
    }

    public function client()
    {
        return $this->belongsTo('App\models\Client');
    }

}