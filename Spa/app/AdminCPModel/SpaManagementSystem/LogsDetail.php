<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class LogsDetail extends Model
{
    protected $table = "spams_logs_detail";
    protected $primaryKey = "LogDetailId";
    public $timestamps = false;

    public function getServices(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Services','ServicesId','ServicesId');
    }

    public function getLogs(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Logs','LogsId','LogsId');
    }

    
}
