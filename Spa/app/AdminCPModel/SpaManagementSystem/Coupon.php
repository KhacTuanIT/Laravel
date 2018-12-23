<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = "spams_coupon";
    protected $primaryKey = "CouponId";
    public $timestamps = false;
}
