<?php

namespace App\CmsSpa;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $table = 'spams_services';
    protected $primaryKey = 'ServicesId';
    protected $timestamp = false;

    public function getService() {
    	return $this->hasMany('App\CmsSpa\Service','service_type_id','ServicesId');
    }

    public function getPost() {
    	return $this->hasMany('App\CmsSpa\Post','service_type_id','ServicesId');
    }

    public function getGallery() {
    	return $this->hasMany('App\CmsSpa\Gallery','service_type_id','ServicesId');
    }

    public function getReservation() {
    	return $this->hasMany('App\CmsSpa\Reservation','service_id','ServicesId');
    }
}
