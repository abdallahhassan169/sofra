<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';
    public $timestamps = true;
    protected $fillable = array('platform', 'client_id','token');
    public function clients(){
        return $this->belongsTo('App\models\Client');
    }
    public function sellers(){
        return $this->belongsTo('App\models\Seller');
    }

}
