<?php

namespace App\Spa;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'spa_reservation';
    public $timestamps = false;

    public function getTypeReservation() {
    	return $this->belongsTo('App\Spa\ServiceType','service_id','ServicesId');
    }
}
