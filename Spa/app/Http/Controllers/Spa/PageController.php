<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function getIndexPage() {
    	return view('spa.page.index');
    }

    public function getContactPage() {
    	return view('spa.page.contact');
    }

    public function getServicesPage() {
    	return view('spa.page.services');
    }

    public function getPricingPage() {
    	return view('spa.page.pricing');
    }

    public function getBlogPage() {
    	return view('spa.page.blog');
    }

    public function getGalleryPage() {
    	return view('spa.page.gallery');
    }

    public function getSignInPage() {
    	return view('spa.page.login');
    }

    public function getSignUpPage() {
    	return view('spa.page.signup');
    }
}
