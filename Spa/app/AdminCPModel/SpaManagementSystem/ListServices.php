<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class ListServices extends Model
{
	protected $table = "spams_services";
    protected $primaryKey = "ServicesId";

    public $timestamps = false;
}
