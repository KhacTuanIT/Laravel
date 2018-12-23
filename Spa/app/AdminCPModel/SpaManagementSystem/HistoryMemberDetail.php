<?php

namespace App\AdminCPModel\SpaManagementSystem;

use Illuminate\Database\Eloquent\Model;

class HistoryMemberDetail extends Model
{
    protected $table = "spams_history_member_detail";
    protected $primaryKey = "HistoryMemberDetailId";
    public $timestamps = false;

    public function getServices(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\Services','ServicesId','ServicesId');
    }

    public function getHistoryMember(){
    	return $this->belongsTo('App\AdminCPModel\SpaManagementSystem\HistoryMember','HistoryMemberId','HistoryMemberId');
    }

}
