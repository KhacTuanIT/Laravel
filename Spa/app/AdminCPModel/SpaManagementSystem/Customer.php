<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'spams_customer';
    protected $primaryKey = 'CustomerId';
    public $incrementing = false;
    public $timestamps = false;

    public function getCustomerBooking(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\CustomerBooking','CustomerId','CustomerId');
    }
}
