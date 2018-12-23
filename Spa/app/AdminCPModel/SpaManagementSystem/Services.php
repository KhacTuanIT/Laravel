<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
	protected $table = "spams_services";
    protected $primaryKey = "ServicesId";

    public $timestamps = false;

    public function getCustomerBooking(){
    	return $this->belongsToMany('App\AdminCPModel\SpaManagementSystem\CustomerBooking','App\AdminCPModel\SpaManagementSystem\CustomerBookingDetail','CustomerBookingId','ServicesId');
    }    

}
