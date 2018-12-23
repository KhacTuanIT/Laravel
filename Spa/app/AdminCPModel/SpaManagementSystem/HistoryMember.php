<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class HistoryMember extends Model
{
    protected $table = "spams_history_member";
    protected $primaryKey = "HistoryMemberId";
    public $timestamps = true;

    public function getHistoryMemberDetail(){
        return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\HistoryMemberDetail','HistoryMemberId','HistoryMemberId');
    }

    public function getCustomerMember(){
        return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\CustomerMember','CustomerMemberId','CustomerMemberId');
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
