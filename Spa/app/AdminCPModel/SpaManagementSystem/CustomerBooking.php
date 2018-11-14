<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class CustomerBooking extends Model
{
    protected $table = "spams_customerbooking";
    protected $primaryKey = "CustomerBookingId";
    // public $timestamps = true;
    const CREATED_AT = 'CustomerBookingTime';

    public function getServices(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\ListServices','ServicesId','ServicesId');
    }

    public function getStaff(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\ListStaff','StaffId','StaffId');
    }

    public function getRoom(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\ListRoom','RoomId','RoomId');
    }
}
