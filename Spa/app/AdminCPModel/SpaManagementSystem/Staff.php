<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = "spams_staff";
    protected $primaryKey = "StaffId";

    public $timestamps = true;

    public function getRoom(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Room','StaffWorkAtRoom','RoomId');
    }
    
    public function getCustomerBooking(){
    	return $this->hasMany('App\AdminCPModel\SpaManagementSystem\CustomerBooking');
    }
}
