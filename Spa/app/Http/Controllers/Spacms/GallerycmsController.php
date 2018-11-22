<?php

namespace App\Http\Controllers\Spacms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GallerycmsController extends Controller
{
    public function getGalleryCms() {
    	return view('spa.spacms.galleries.gallery');
    }
}
