<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model 
{

    protected $table = 'types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function restaurants()
    {
        return $this->belongsToMany('App\models\Restaurant');
    }

}