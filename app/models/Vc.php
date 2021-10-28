<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Vc extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = array('client_id', 'notification_id');

}