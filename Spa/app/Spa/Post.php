<?php

namespace App\Spa;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'spa_posts';
    protected $primaryKey = 'id';

    public function getPostType() {
    	return $this->belongsTo('App\Spa\ServiceType','service_type_id','ServicesId');
    }

    public function getCommentPost() {
    	return $this->hasMany('App\Spa\Comment','post_id','id');
    }
}
