<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'spams_customer';
    protected $primaryKey = 'CustomerId';
    public $timestamps = false;

    public function getCustomerBooking(){
    	return $this->hasMany('App\AdminCPModel\SpaManagementSystem\CustomerBooking');
    }
}
