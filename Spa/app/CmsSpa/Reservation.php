<?php

namespace App\CmsSpa;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'spa_reservation';
    public $timestamps = false;

    public function getReservationType() {
    	return $this->belongsTo('App\CmsSpa\ServiceType','service_id','ServicesId');
    }
}
