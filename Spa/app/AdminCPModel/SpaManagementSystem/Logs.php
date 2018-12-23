<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = "spams_logs";
    protected $primaryKey = "LogsId";
    public $timestamps = true;

    public function getLogsDetail(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\LogsDetail','LogsId','LogsId');
    }

    public function getRoom(){
        return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Room','RoomId','RoomId');
    }

    public function getStaff(){
        return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Staff','StaffId','StaffId');
    }

    public function getCoupon(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Coupon','CouponCode','CouponCode');
    }
}
