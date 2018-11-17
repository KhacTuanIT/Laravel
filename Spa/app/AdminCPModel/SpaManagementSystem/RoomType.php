<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = "spams_roomtype";
    protected $primaryKey = 'RoomTypeId';
    public $timestamps = false;

    // public function getRoom(){
    // 	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Room','RoomTypeId','RoomType');
    // }
    public function getRoom(){
    	return $this->hasMany('App\AdminCPModel\SpaManagementSystem\Room');
    }

}
