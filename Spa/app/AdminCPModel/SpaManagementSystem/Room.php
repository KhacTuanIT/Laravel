<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "spams_room";
    protected $primaryKey = "RoomId";

    public $timestamps = false;

    // public function getRoomType(){
    // 	return $this->hasOne('App\AdminCPModel\SpaManagementSystem\RoomType','RoomTypeId','RoomType');
    //}    
    public function getRoomType(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\RoomType','RoomTypeId','RoomTypeId');
    }

    public function getCustomerBooking(){
    	return $this->hasMany('App\AdminCPModel\SpaManagementSystem\CustomerBooking');
    }

    public function getStaffWorking(){
    	return $this->hasMany('App\AdminCPModel\SpaManagementSystem\Staff','RoomId','StaffWorkAtRoom');
    }
}
