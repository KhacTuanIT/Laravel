<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class ListRoom extends Model
{
    protected $table = "spams_room";
    public $timestamps = false;

    public function getRoomType(){
    	return $this->hasOne('App\AdminCPModel\SpaManagementSystem\RoomType','RoomTypeId','RoomType');
    }
}
