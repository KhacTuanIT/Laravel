<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class ListStaff extends Model
{
    protected $table = "spams_staff";
    protected $primaryKey = "StaffId";

    public $timestamps = false;

    public function getRoom(){
    	return $this->hasOne('App\AdminCPModel\SpaManagementSystem\ListRoom','RoomId','StaffWorkAtRoomId');
    }
}
