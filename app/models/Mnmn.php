<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Mnmn extends Model 
{

    protected $table = 'notification_seller';
    public $timestamps = true;
    protected $fillable = array('notifacation_id');

}