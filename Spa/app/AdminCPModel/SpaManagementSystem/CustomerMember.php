<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class CustomerMember extends Model
{
    protected $table = "spams_customer_member";
    protected $primaryKey = "CustomerMemberId";
    public $incrementing = false;
    public $timestamps = true;

    public function getCustomerBooking(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\CustomerBooking','CustomerId','CustomerMemberId');
    }
}
