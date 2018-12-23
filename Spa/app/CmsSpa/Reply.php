<?php

namespace App\CmsSpa;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'spa_reply';
    protected $primaryKey = 'id';

    public function getCommentReply() {
    	return $this->belongsTo('App\CmsSpa\Comment','comment_id','id');
    }
}
