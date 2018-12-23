<?php

namespace App\Http\Controllers\Spacms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\CmsSpa\Gallery;
use App\CmsSpa\ServiceType;

class GallerycmsController extends Controller
{
	public function getGalleryCms() {
		$galleries = Gallery::all();
		return view('spa.spacms.galleries.gallery',compact('galleries'));
	}

	public function getAddGallery() {
		$services = ServiceType::all();
		return view('spa.spacms.galleries.add_gallery',compact('services'));
	}

	public function postAddGalleryCms(Request $req) {
		$this->validate($req,
			[
				'title_gallery'=>'required',
				'type_gallery'=>'required',
				'image_gallery'=>'required',
				'type_s'=>'required'
			],
			[
				'required' => 'Bạn chưa :attribute'
			],
			[
				'title_gallery'=> ' nhập tiêu đề.',
				'type_gallery'=> ' chọn loại dịch vụ.',
				'image_gallery'=> ' chọn ảnh.',
				'type_s'=> ' chọn loại.'
			]
		);

		$gallery = new Gallery;
		$gallery->title = $req->title_gallery;
		$gallery->description = $req->description_gallery;
		$gallery->service_type_id = $req->type_gallery;
		$gallery->type = $req->type_s;
		if($req->hasFile('image_gallery')) {
			$file = $req->file('image_gallery');
			$extensions = $file->getClientOriginalExtension();
			if($extensions != 'png' and $extensions != 'jpeg' and $extensions != 'jpg') {
				return back()->withErrors('Bạn chỉ có thể upload file ảnh!');
			}
			$name = str_random(10).'.'.$file->getClientOriginalExtension();
	        $file->move('source/spa/assets/images/galleries/', $name);
	        $gallery->image = $name;
		}

		$checkAddGallery = $gallery->save();
		$success = "Thêm ảnh vào bộ sưu tập thành công, ảnh: ".$gallery->image.".";
		return redirect()->back()->with('success',$success);
	}

	public function getEditGalleryCms($id) {
		$gallery = Gallery::find($id);
		$servicesActive = ServiceType::find($gallery->service_type_id);
		$services = ServiceType::all();
		return view('spa.spacms.galleries.edit_gallery',compact('gallery','services','servicesActive'));
	}

	public function postEditedGalleryCms(Request $req) {
		if($req->img_check=='on') {
			$this->validate($req,
				[
					'title_gallery'=>'required',
					'type_gallery'=>'required',
					'image_gallery'=>'required',
					'type_s'=>'required'
				],
				[
					'required' => 'Bạn chưa :attribute'
				],
				[
					'title_gallery'=> ' nhập tiêu đề.',
					'type_gallery'=> ' chọn loại dịch vụ.',
					'image_gallery'=> ' chọn ảnh.',
					'type_s'=> ' chọn loại.'
				]
			);
			if($req->hasFile('image_gallery')) {
				$file = $req->file('image_gallery');
				$name = str_random(10).'.'.$file->getClientOriginalExtension();
		        $file->move('source/spa/assets/images/galleries/', $name);
		        $image = $name;
			}
			$gallery = Gallery::where('id',$req->id_gallery)->update(array(
				'title' => $req->title_gallery,
				'service_type_id' => $req->type_gallery,
				'description' => $req->description_gallery,
				'type'=> $req->type_s,
				'image' => $image
			));
		} else {
			$this->validate($req,
				[
					'title_gallery'=>'required',
					'type_gallery'=>'required',
					'type_s'=>'required'
				],
				[
					'required' => 'Bạn chưa :attribute'
				],
				[
					'title_gallery'=> ' nhập tiêu đề.',
					'type_gallery'=> ' chọn loại dịch vụ.',
					'type_s'=> ' chọn loại.'
				]
			);
			$gallery = Gallery::where('id',$req->id_gallery)->update(array(
				'title' => $req->title_gallery,
				'service_type_id' => $req->type_gallery,
				'description' => $req->description_gallery,
				'type'=> $req->type_s,
			));
		}
		if($gallery == true) {
			$success = "Cập nhật thông tin thành công, ID: ".$req->id_gallery.".";
			return redirect()->back()->with('success',$success);
		} else {
			return back()->withErrors();
		}
	}

	public function deleteGalleryCms($id) {
		$gallery = new Gallery;
		$temp = $gallery->find($id);
		$imageName = $temp->image;
		$filePath = 'source/spa/assets/images/galleries/'.$imageName;
		if(file_exists($filePath)) {
			File::delete($filePath);
		}
		$checkDeleteGallery = $gallery->find($id)->delete();
		if($checkDeleteGallery == true) {
			$success = "Xóa thành công, ID: ". $id.".";
			return back()->with('success',$success);
		} else {
			return back()->withErrors();
		}
	}

}
