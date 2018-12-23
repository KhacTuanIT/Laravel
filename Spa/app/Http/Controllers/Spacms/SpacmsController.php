<?php

namespace App\Http\Controllers\Spacms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsSpa\Blog;
use App\CmsSpa\Comment;
use App\CmsSpa\Feedback;
use App\CmsSpa\Gallery;
use App\CmsSpa\Post;
use App\CmsSpa\Reply;
use App\CmsSpa\Service;
use App\CmsSpa\ServiceType;
use App\CmsSpa\Slider;
use App\CmsSpa\Reservation;

class SpacmsController extends Controller
{
    public function getDashboard() {
    	$blogs = Blog::all();
    	$feedbacks = Feedback::orderBy('id','desc')->get();
    	$comments = Comment::orderBy('id','desc')->get();
    	$galleries = Gallery::all();
    	$posts = Post::all();
    	$services = Service::all();
    	$reservations = Reservation::all();
    	return view('spa.spacms.dashboard.dashboard',compact('blogs','feedbacks','comments','galleries','posts','services','reservations'));
    }

    public function postGDetail(Request $req) {
    	if($req->ajax()) {
    		$all = Gallery::all();
    		$galleries = Gallery::take(5)->get();
    		if(count($galleries) > 0) {
    			$c = 0;
	    		foreach($galleries as $gallery) {
	    			$c += 1;
	    			$many[$c]['title']=$gallery->title;
	    			$many[$c]['description']=$gallery->description;
	    			$many[$c]['type']=$gallery->getGalleryType->ServicesName;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($gallery->created_at));
	    			$id = $gallery->id;
	    		}
	    		if(count($all) > 5) {
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>(count($galleries)-1)
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }
    public function postBDetail(Request $req) {
    	if($req->ajax()) {
    		$all = Blog::all();
    		$blogs = Blog::take(5)->get();
    		if(count($blogs) > 0) {
    			$c = 0;
	    		foreach($blogs as $blog) {
	    			$c += 1;
	    			$many[$c]['title']=$blog->title;
	    			$many[$c]['description']=$blog->description;
	    			$many[$c]['note']=$blog->note;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($blog->created_at));
	    			$id = $blog->id;
	    		}
	    		if(count($all) > 5) {
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>(count($blogs)-1)
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }
    public function postPDetail(Request $req) {
    	if($req->ajax()) {
    		$all = Post::all();
    		$posts = Post::take(5)->get();
    		if(count($posts) > 0) {
    			$c = 0;
	    		foreach($posts as $post) {
	    			$c += 1;
	    			$many[$c]['title']=$post->title;
	    			$many[$c]['description']=$post->description;
	    			$many[$c]['type']=$post->getPostType->ServicesName;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($post->created_at));
	    			$id = $post->id;
	    		}
	    		if(count($all) > 5) {
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>(count($posts)-1)
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }
    public function postSDetail(Request $req) {
    	if($req->ajax()) {
    		$all = Service::all();
    		$services = Service::take(5)->get();
    		if(count($services) > 0) {
    			$c = 0;
	    		foreach($services as $service) {
	    			$c += 1;
	    			$many[$c]['title']=$service->title;
	    			$many[$c]['description']=$service->description;
	    			$many[$c]['price']=$service->price;
	    			$many[$c]['type']=$service->getServiceType->ServicesName;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($service->created_at));
	    			$id = $service->id;
	    		}
	    		if(count($all) > 5) {
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>(count($services)-1)
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }

    public function postNextGDetail(Request $req, $id) {
    	if($req->ajax()) {
    		$all = Gallery::all();
    		$galleries = Gallery::where('id','>',$id)->take(5)->get();
    		if(count($galleries) > 0) {
    			$c = 0;
	    		foreach($galleries as $gallery) {
	    			$c += 1;
	    			$many[$c]['title']=$gallery->title;
	    			$many[$c]['description']=$gallery->description;
	    			$many[$c]['type']=$gallery->getGalleryType->ServicesName;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($gallery->created_at));
	    			$id = $gallery->id;
	    		}
	    		if(count($all) > (((int)($req->numdata)) + 5)) {
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		$num = count($galleries);
	    		$num = $num - 1;
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>$num
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }

    public function postNextBDetail(Request $req, $id) {
    	if($req->ajax()) {
    		$all = Blog::all();
    		$blogs = Blog::where('id','>',$id)->take(5)->get();
    		if(count($blogs) > 0) {
    			$c = 0;
	    		foreach($blogs as $blog) {
	    			$c += 1;
	    			$many[$c]['title']=$blog->title;
	    			$many[$c]['description']=$blog->description;
	    			$many[$c]['note']=$blog->note;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($blog->created_at));
	    			$id = $blog->id;
	    		}
	    		if(count($all) > (((int)($req->numdata)) + 5)) {
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>(count($blogs)-1)
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }

    public function postNextPDetail(Request $req, $id) {
    	if($req->ajax()) {
    		$all = Post::all();
    		$posts = Post::where('id','>',$id)->take(5)->get();
    		if(count($posts) > 0) {
    			$c = 0;
	    		foreach($posts as $post) {
	    			$c += 1;
	    			$many[$c]['title']=$post->title;
	    			$many[$c]['description']=$post->description;
	    			$many[$c]['type']=$post->getPostType->ServicesName;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($post->created_at));
	    			$id = $post->id;
	    		}
	    		if(count($all) > (((int)($req->numdata)) + 5)) {
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>(count($posts)-1)
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }

    public function postNextSDetail(Request $req, $id) {
    	if($req->ajax()) {
    		$all = Service::all();
    		$services = Service::where('id','>',$id)->take(5)->get();
    		if(count($services) > 0) {
    			$c = 0;
	    		foreach($services as $service) {
	    			$c += 1;
	    			$many[$c]['title']=$service->title;
	    			$many[$c]['description']=$service->description;
	    			$many[$c]['price']=$service->price;
	    			$many[$c]['type']=$service->getServiceType->ServicesName;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($service->created_at));
	    			$id = $service->id;
	    		}
	    		if(count($all) > (((int)($req->numdata)) + 5)) {
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>(count($services)-1)
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }

    public function postPreGDetail(Request $req, $pre, $next) {
    	if($req->ajax()) {
    		$all = Gallery::all();
    		$galleries = Gallery::where('id','<=',$pre)->take(5)->get();
    		$lastnum = count(Gallery::where('id','>',$pre)->where('id','<=',$next)->get());
    		if(count($galleries) > 0) {
    			$c = 0;
	    		foreach($galleries as $gallery) {
	    			$c += 1;
	    			$many[$c]['title']=$gallery->title;
	    			$many[$c]['description']=$gallery->description;
	    			$many[$c]['type']=$gallery->getGalleryType->ServicesName;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($gallery->created_at));
	    			$id = $gallery->id;
	    		}
	    		if(count($all) - ((int)($req->numdata))> 0){
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$pre,
	    			'idpre'=>$galleries->first()->id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>(((int)($req->numdata)) - $lastnum)
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }

    public function postPreBDetail(Request $req, $id) {
    	if($req->ajax()) {
    		$all = Blog::all();
    		$blogs = Blog::where('id','<=',$id)->take(5)->get();
    		$lastnum = count(Blog::where('id','>',$pre)->where('id','<=',$next)->get());
    		if(count($blogs) > 0) {
    			$c = 0;
	    		foreach($blogs as $blog) {
	    			$c += 1;
	    			$many[$c]['title']=$blog->title;
	    			$many[$c]['description']=$blog->description;
	    			$many[$c]['note']=$blog->note;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($blog->created_at));
	    			$id = $blog->id;
	    		}
	    		if(count($all) - ((int)($req->numdata))> 0){
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$id,
	    			'idpre'=>$blogs->first()->id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>(((int)($req->numdata)) - $lastnum)
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }

    public function postPrePDetail(Request $req, $id) {
    	if($req->ajax()) {
    		$all = Post::all();
    		$posts = Post::where('id','<=',$id)->take(5)->get();
    		$lastnum = count(Post::where('id','>',$pre)->where('id','<=',$next)->get());
    		if(count($posts) > 0) {
    			$c = 0;
	    		foreach($posts as $post) {
	    			$c += 1;
	    			$many[$c]['title']=$post->title;
	    			$many[$c]['description']=$post->description;
	    			$many[$c]['type']=$post->getPostType->ServicesName;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($post->created_at));
	    			$id = $post->id;
	    		}
	    		if(count($all) - ((int)($req->numdata))> 0){
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$id,
	    			'idpre'=>$posts->first()->id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>(((int)($req->numdata)) - $lastnum)
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }

    public function postPreSDetail(Request $req, $pre, $next) {
    	if($req->ajax()) {
    		$all = Service::all();
    		$services = Service::where('id','<=',$pre)->take(5)->get();
    		$lastnum = count(Service::where('id','>',$pre)->where('id','<=',$next)->get());
    		if(count($services) > 0) {
    			$c = 0;
	    		foreach($services as $service) {
	    			$c += 1;
	    			$many[$c]['title']=$service->title;
	    			$many[$c]['description']=$service->description;
	    			$many[$c]['price']=$service->price;
	    			$many[$c]['type']=$service->getServiceType->ServicesName;
	    			$many[$c]['time']=date('d/m/y-h:i',strtotime($service->created_at));
	    			$id = $service->id;
	    		}
	    		if(count($all) - ((int)($req->numdata))> 0){
	    			$temp = 2;
	    		} else {
	    			$temp = 1;
	    		}
	    		return response()->json([
	    			'data'=>$many,
	    			'id'=>$id,
	    			'idpre'=>$services->first()->id,
	    			'temp'=>$temp,
	    			'all'=>count($all),
	    			'num'=>(((int)($req->numdata)) - $lastnum)
	    		],200);
    		} else {
    			return response()->json([
	    			'temp'=>0,
	    		],200);
    		}
    	}
    }

    public function postRT(Request $req) {
    	if($req->ajax()) {
    		$comments = Comment::orderBy('id','desc')->get();
    		$feedbacks = Feedback::orderBy('id','desc')->get();
    		$posts = Post::all();
    		$c = 0;
    		foreach ($comments as $comment) {
    			$c += 1;
    			$temp[$c]['name'] = $comment->name;
    			$temp[$c]['created_at'] = $comment->created_at;
    			$temp[$c]['title'] = $comment->getPostComment->title;
    			$temp[$c]['message'] = $comment->message;
    		}
    		return response()->json([
    			'allc'	=>	count($comments),
    			'allf'	=>	count($feedbacks),
    			'comments'	=>	$temp,
    			'feedbacks'	=>	$feedbacks,
    			'posts'		=>	$posts
    		], 200);
    	}
    }
}
