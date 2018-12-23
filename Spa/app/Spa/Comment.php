<?php

namespace App\Spa;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'spa_comment';
    protected $primaryKey = 'id';

	public function getPostComment() {
		return $this->belongsTo('App\Spa\Post','post_id','id');
	}
	public function getReplyComment() {
		return $this->hasMany('App\Spa\Reply','comment_id','id');
	}
}
