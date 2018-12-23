<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class CustomerBooking extends Model
{
    protected $table = "spams_customerbooking";
    protected $primaryKey = "CustomerBookingId";
    // public $timestamps = true;
    const CREATED_AT = 'CustomerBookingTime';

    // public function getServices(){
    // 	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Services','ServicesId','ServicesId');
    // }

    // public function getStaff(){
    // 	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Staff','StaffId','StaffId');
    // }

    // public function getRoom(){
    // 	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Room','RoomId','RoomId');
    // }

    public function getServices(){
        return $this->belongsToMany('App\AdminCPModel\SpaManagementSystem\Services','CustomerBookingDetail','CustomerBookingId','CustomerBookingDetailId');
    }

    public function getSv(){
        return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\CustomerBookingDetail','CustomerBookingId','CustomerBookingId');
    }

    public function getCustomer(){
        return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Customer','CustomerId','CustomerId');
    } 

    public function getCustomerMember(){
        return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\CustomerMember','CustomerId','CustomerMemberId');
    }


    
    public function getRoom(){
        return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Room','RoomId','RoomId');
    }

    public function getStaff(){
        return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Staff','StaffId','StaffId');
    }


}
