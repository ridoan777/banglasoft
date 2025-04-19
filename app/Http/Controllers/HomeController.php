<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Marquee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index(){

		$marqueeData = Marquee::where('status', 1)->first();
		$faqData = Faq::where('status', 1)->get();

		return view('homepage.home', [
			'marqueeData' => $marqueeData,
			'faqData' => $faqData,
		]);
	}
}
