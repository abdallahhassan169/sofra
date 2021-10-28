<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $table = 'restaurants';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'less_price', 'delivery_price', 'active', 'details', 'area_id');

    public function seller()
    {
        return $this->belongsTo('App\models\Seller');
    }

    public function comments()
    {
        return $this->hasMany('App\models\Comment');
    }
    public function orders()
    {
        return $this->hasMany('App\models\Order');
    }

    public function area()
    {
        return $this->belongsTo('App\models\Area');
    }

    public function commission()
    {
        return $this->hasOne('App\models\Commission');
    }

    public function types()
    {
        return $this->belongsToMany('App\models\Type');
    }
    public function offers()
    {
        return $this->hasMany('App\models\Offer');
    }

}
