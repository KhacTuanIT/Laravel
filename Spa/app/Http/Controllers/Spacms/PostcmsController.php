<?php

namespace App\Http\Controllers\Spacms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\CmsSpa\Post;
use App\CmsSpa\ServiceType;

class PostcmsController extends Controller
{
    public function getPostCms() {
    	$posts = Post::all();
    	return view('spa.spacms.posts.post',compact('posts'));
    }

    public function getAddPostCms() {
		$services = ServiceType::all();
		return view('spa.spacms.posts.add_post',compact('services'));
	}

	public function postAddPostCms(Request $req) {
		$this->validate($req,
			[
				'title_post'=>'required',
				'type_post'=>'required',
				'image_post'=>'required'
			],
			[
				'required' => 'Bạn chưa :attribute'
			],
			[
				'title_post'=> ' nhập tiêu đề.',
				'type_post'=> ' chọn loại dịch vụ.',
				'image_post'=> ' chọn ảnh.'
			]
		);

		$post = new Post;
		$post->title = $req->title_post;
		$post->description = $req->description_post;
		$post->service_type_id = $req->type_post;
		if($req->hasFile('image_post')) {
			$file = $req->file('image_post');
			$extensions = $file->getClientOriginalExtension();
			if($extensions != 'png' and $extensions != 'jpeg' and $extensions != 'jpg') {
				return back()->withErrors('Bạn chỉ có thể upload file ảnh!');
			}
			$name = str_random(10).'.'.$file->getClientOriginalExtension();
	        $file->move('source/spa/assets/images/posts/', $name);
	        $post->image = $name;
		}

		$checkAddPost = $post->save();
		$success = "Thêm bài viết thành công, bài viết: ".$post->title.".";
		return redirect()->back()->withInput()->with('success',$success);
	}

	public function getEditPostCms($id) {
		$post = Post::find($id);
		$servicesActive = ServiceType::find($post->service_type_id);
		$services = ServiceType::all();
		return view('spa.spacms.posts.edit_post',compact('post','services','servicesActive'));
	}

	public function postEditPostCms(Request $req, $id) {
		if($req->img_check == 'on') {
			$this->validate($req,
				[
					'title_post'=>'required',
					'type_post'=>'required',
					'image_post'=>'required'
				],
				[
					'required' => 'Bạn chưa :attribute'
				],
				[
					'title_post'=> ' nhập tiêu đề.',
					'type_post'=> ' chọn loại dịch vụ.',
					'image_post'=> ' chọn ảnh.'
				]
			);
			if($req->hasFile('image_gallery')) {
				$file = $req->file('image_gallery');
				$name = str_random(10).'.'.$file->getClientOriginalExtension();
		        $file->move('source/spa/assets/images/posts/', $name);
		        $image = $name;
			}
			$post = Post::where('id',$id)->update(array(
				'title' => $req->title_post,
				'service_type_id' => $req->type_post,
				'description' => $req->description_post,
				'image' => $image
			));
		} else {
			$this->validate($req,
				[
					'title_post'=>'required',
					'type_post'=>'required',
				],
				[
					'required' => 'Bạn chưa :attribute'
				],
				[
					'title_post'=> ' nhập tiêu đề.',
					'type_post'=> ' chọn loại dịch vụ.',
				]
			);
			$post = Post::where('id',$id)->update(array(
				'title' => $req->title_post,
				'service_type_id' => $req->type_post,
				'description' => $req->description_post,
			));
		}
		if($post == true ) {
			$success = "Cập nhật thông tin bài viết thành công, ID: ".$req->id_post.".";
			return redirect()->back()->withInput()->with('success',$success);
		} else {
			return back()->withErrors();
		}
	}

	public function getDeletePostCms($id) {
		$post = new Post;
		$temp = $post->find($id);
		$imageName = $temp->image;
		$filePath = 'source/spa/assets/images/posts/'.$imageName;
		if(file_exists($filePath)) {
			File::delete($filePath);
		}
		$checkDeletePost = $post->find($id)->delete();
		if($checkAddPost ==  true) {
			$success = "Xóa thành công bài viết có ID: ". $id.".";
			return back()->with('success',$success);
		} else {
			return back()->withErrors();
		}
	}
}
