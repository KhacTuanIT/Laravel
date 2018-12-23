<?php

namespace App\CmsSpa;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'spa_comment';
    protected $primaryKey = 'id';

    public function getPostComment() {
    	return $this->belongsTo('App\CmsSpa\Post','post_id','id');
    }

    public function getReplyComment() {
    	return $this->hasMany('App\CmsSpa\Reply','comment_id','id');
    }
}
