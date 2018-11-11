<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class CustomerBooking extends Model
{
    protected $table = "spams_customerbooking";
    // public $timestamps = true;
    const CREATED_AT = 'CustomerBookingTime';

}
