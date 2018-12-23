<?php

namespace App\CmsSpa;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'spa_galleries';
    protected $primaryKey = 'id';

    public function getGalleryType() {
    	return $this->belongsTo('App\CmsSpa\ServiceType','service_type_id','ServicesId');
    }
}
