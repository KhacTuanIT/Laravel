<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = "spams_roomtype";
    public $timestamps = false;

    public function getRoom(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\ListRoom','RoomType','RoomTypeId');
    }
}
