<?php

namespace App\CmsSpa;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'spa_services';
    protected $primaryKey = 'id';

    public function getServiceType() {
    	return $this->belongsTo('App\CmsSpa\ServiceType','service_type_id','ServicesId');
    }
}
