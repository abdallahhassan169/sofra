<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'details', 'is_read');

    public function clients()
    {
        return $this->belongsToMany('App\models\Client');
    }

    public function sellers()
    {
        return $this->belongsToMany('App\models\Seller');
    }

}