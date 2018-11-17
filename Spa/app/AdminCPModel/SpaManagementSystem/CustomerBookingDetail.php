<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class CustomerBookingDetail extends Model
{
    protected $table = 'spams_customerbookingdetail';
    protected $primaryKey = 'CustomerBookingDetailId';
    public $timestamps = false;

    public function getServices(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Services','ServicesId','ServicesId');
    }
}
