<?php

namespace App\Http\Controllers\Spacms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\CmsSpa\Service;
use App\CmsSpa\ServiceType;
use App\Http\Requests\ServiceRequest;

class ServicecmsController extends Controller
{
    public function getServiceCms() {
    	$services = Service::all();
    	return view('spa.spacms.services.service',compact('services'));
    }

    public function getAddServiceCms() {
    	$serviceType = ServiceType::all();
    	return view('spa.spacms.services.add_service',compact('serviceType'));
    }

	public function postAddServiceCms(ServiceRequest $req) {
		$service = new Service;
		$service->title = $req->title_service;
		$service->aside = $req->aside_service;
		$service->price = $req->price_service;
		$service->service_type_id = $req->type_service;
		$service->description = $req->description_service;
		if($req->hasFile('image_service')) {
			$file = $req->file('image_service');
			$extensions = $file->getClientOriginalExtension();
			if($extensions != 'png' and $extensions != 'jpeg' and $extensions != 'jpg') {
				return back()->withErrors('Bạn chỉ có thể upload file ảnh!');
			}
			$name = str_random(10).'.'.$file->getClientOriginalExtension();
	        $file->move('source/spa/assets/images/services/', $name);
	        $service->image = $name;
		}
		$checkAddservice = $service->save();
		if($checkAddservice == true) {
			$success = "Thêm thành công dịch vụ: ".$service->title.".";
			return redirect()->back()->withInput()->with('success',$success);
		} else {
			return back()->withErrors()->withInput();
		}
	}

	public function getEditServiceCms($id) {
		$service = Service::find($id);
		$services = ServiceType::all();
		$serviceActive = ServiceType::find($service->service_type_id);
		return view('spa.spacms.services.edit_service',compact('service','services','serviceActive'));
	}

	public function postEditServiceCms(Request $req, $id) {
		if($req->img_check == 'on') {
			$this->validate($req,
				[
					'title_service'=>'required|unique:spa_services,title,'.$id,
					'aside_service'=>'required',
					'image_service'=>'required',
					'price_service'=>'required',
					'type_service'=>'required',
				],
				[
					'required' => 'Bạn chưa :attribute',
					'title_service.unique'=>'Dịch vụ đã tồn tại',
				],
				[
					'title_service'=>' nhập tiêu tên dịch vụ.',
					'aside_service'=>' chọn vị trí.',
					'image_service'=>' chọn ảnh.',
					'price_service'=>' nhập giá.',
					'type_service'=>' chọn loại dịch vụ.',
				]
			);
			if($req->hasFile('image_service')) {
				$file = $req->file('image_service');
				$name = str_random(10).'.'.$file->getClientOriginalExtension();
		        $file->move('source/spa/assets/images/services/', $name);
		        $image = $name;
			}
			$service = Service::where('id',$id)->update(array(
				'title' => $req->title_service,
				'aside' => $req->aside_service,
				'price' => $req->price_service,
				'description' => $req->description_service,
				'service_type_id' => $req->type_service,
				'image' => $image
			));
		} else {
			$this->validate($req,
				[
					'title_service'=>'required|unique:spa_services,title,'.$id,
					'aside_service'=>'required',
					'price_service'=>'required',
					'type_service'=>'required',
				],
				[
					'required' => 'Bạn chưa :attribute',
					'title_service.unique'=>'Dịch vụ đã tồn tại',
				],
				[
					'title_service'=>' nhập tiêu tên dịch vụ.',
					'aside_service'=>' chọn vị trí.',
					'price_service'=>' nhập giá.',
					'type_service'=>' chọn loại dịch vụ.',
				]
			);
			$service = Service::where('id',$id)->update(array(
				'title' => $req->title_service,
				'aside' => $req->aside_service,
				'price' => $req->price_service,
				'description' => $req->description_service,
				'service_type_id' => $req->type_service,
			));
		}
		if($service == true) {
			$success = "Cập nhật thông tin dịch vụ thành công, ID: ".$id." thành công.";
			return redirect()->route('service-cms')->with('success',$success);
		} else {
			return back()->withErrors();
		}
	}

	public function getDeleteServiceCms($id) {
		$service = new Service;
		$temp = $service->find($id);
		$imageName = $temp->image;
		$filePath = 'source/spa/assets/images/posts/'.$imageName;
		if(file_exists($filePath)) {
			File::delete($filePath);
		}
		$checkDelete = $service->find($id)->delete();
		if($checkDelete == true) {
			$success = "Xóa thành công dịch vụ có ID: ". $id.".";
			return back()->with('success',$success);
		} else {
			return back()->withErrors();
		}
	}

	public function getSyncServiceCms() {
		$service_type = ServiceType::all();
		$countN = 0;
		foreach ($service_type as $st) {
			$service = Service::findOrFail($st->ServicesId);
			if(count($service)>0) {
				Service::where('id',$st->ServicesId)->update(array(
					'title'=>$st->ServicesName,
					// 'description'=>$st->ServicesDescription,
					'price'=>$st->ServicesPrice,
					'service_type_id'=>$st->ServicesId
				));
				$countN = $countN + 1;
			} else {
				$sv = new Service();
				$sv->title = $st->ServicesName;
				$sv->description = $st->ServicesDescription;
				$sv->price = $st->ServicesPrice;
				$sv->service_type_id = $st->ServicesId;
				$sv->save();
				$countN = $countN + 1;
			}
		}
		if($countN > 0) {
			return back()->with('success','Đồng bộ thành công!');
		} else {
			return back()->with('success','Dữ liệu đã được đồng bộ');
		}
	}
}
