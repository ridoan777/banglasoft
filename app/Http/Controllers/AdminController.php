<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Carousel;
use App\Models\Faq;
use App\Models\Marquee;
use Illuminate\Http\Request;

class AdminController extends Controller
{

	public function index()
	{
		$carouselData = Carousel::all();
		$marqueeData = Marquee::all();
		$faqData = Faq::all();

		return view('components.admin.dashboard', [
			'marqueeData' => $marqueeData, 
			'faqData' => $faqData,
			'carouselData' => $carouselData,
		]);
	}
	// -------------------------------
	

 // ---------CARROUSEL CONTROL---------
	public function carouselCreate(Request $request)
	{
		$validated = $request->validate([
			'slider_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
			'status' => 'required',
		]);

		if($request->hasFile('slider_img')){
			$slider_img = $request->file('slider_img');

			$imageName = substr(time(), -4) . '.' . $slider_img->getClientOriginalExtension();

			$slider_img->storeAs('admin_files/carousel', $imageName, 'public');

			$validated['slider_img'] = 'storage/admin_files/carousel/' . $imageName;
		}

		Carousel::create([
			'slider_img' => $validated['slider_img'],
			'status' => $validated['status'],
		]);

		return redirect()->route('admin');
	}
	// ------------------------------
	public function carouselEdit($id){

		$carousel = Carousel::find($id);
		$triggerBlock = 'carousel';

		return view('components.partials.admin.edit', [
			'carousel' => $carousel, 
			'triggerBlock' => $triggerBlock
		]);
	}
	// ------------------------------
	public function carouselUpdate(Request $request, $id){

		$carousel = Carousel::findOrFail($id);

		$validated = $request->validate([
			'slider_img' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
			'status' => 'required',
		]);

		if($request->hasFile('slider_img')){
			$slider_img = $request->file('slider_img');

			$imageName = substr(time(), -4) . '.' . $slider_img->getClientOriginalExtension();

			$slider_img->storeAs('admin_files/carousel', $imageName, 'public');

			$validated['slider_img'] = 'storage/admin_files/carousel/' . $imageName;
		}

		$carousel->update($validated);

		return redirect()->route('admin');
	}
	// ------------------------------
	public function carouselDelete($id){

		$carousel = Carousel::find($id);
		$carousel->delete();

		return redirect()->route('admin');
	}
 // ---------CARROUSEL CONTROL---------

 // ---------MARQUEE CONTROL---------
	public function marqueeCreate(Request $request)
	{
		$validated = $request->validate([
			'content' => 'required|max:256',
			'status' => 'required',
			'color' => 'required',
			'bg_color' => 'required',
			'font_size' => 'required',
		]);
		$marquee = Marquee::create([
			'content' => $request->content,
			'status' => $request->status,
			'color' => $request->color,
			'bg-color' => $request->bg_color,
			'font-size' => $request->font_size,
		]);

		if ($request->status == 1) {
			Marquee::where('status', 1)->where('id', '!=', $marquee->id)->update(['status' => 0]);
		}

		$marqueeData = Marquee::all();
		return redirect()->route('admin', compact('marqueeData'));
	}
	// ------------------------------
	public function marqueeEdit($id){

		$marquee = Marquee::find($id);
		$triggerBlock = 'marquee';

		return view('components.partials.admin.edit', [
			'marquee' => $marquee, 
			'triggerBlock' => $triggerBlock
		]);
	}
	// ------------------------------
	public function marqueeUpdate(Request $request, $id){

		$marquee = Marquee::find($id);

		$validated = $request->validate([
			'content' => 'required|max:256',
			'status' => 'required',
			'color' => 'required',
			'bg_color' => 'required',
			'font_size' => 'required',
		]);

		$marquee->update([
			'content' => $request->content,
			'status' => $request->status,
			'color' => $request->color,
			'bg-color' => $request->bg_color,
			'font-size' => $request->font_size,
		]);

		if ($request->status == 1) {
			Marquee::where('status', 1)->where('id', '!=', $marquee->id)->update(['status' => 0]);
		}

		$marqueeData = Marquee::all();
		return redirect()->route('admin', compact('marqueeData'));
	}
	// ------------------------------
	public function marqueeDelete($id){

		$marquee = Marquee::find($id);
		$marquee->delete();

		return redirect()->route('admin');
	}
 // ---------MARQUEE CONTROL---------

 // ---------FAQ CONTROL---------
	public function faqCreate(Request $request)
	{
		$validated = $request->validate([
			'title' => 'required|max:256',
			'content' => 'required|max:600',
			'status' => 'required',
		]);

		$faq = Faq::create([
			'title' => $validated['title'],
			'content' => $validated['content'],
			'status' => $validated['status'],
		]);

		// if ($request->status == 1) {
		// 	Faq::where('status', 1)->where('id', '!=', $faq->id)->update(['status' => 0]);
		// }

		return redirect()->route('admin');
	}
	// ------------------------------
	public function faqEdit($id){

		$faq = Faq::find($id);
		$triggerBlock = 'faq';

		return view('components.partials.admin.edit', [
			'faq' => $faq, 
			'triggerBlock' => $triggerBlock
		]);
	}
	// ------------------------------
	public function faqUpdate(Request $request, $id){

		$faq = faq::find($id);

		$validated = $request->validate([
			'title' => 'required|max:256',
			'content' => 'required|max:600',
			'status' => 'required',
		]);

		$faq->update([
			'title' => $validated['title'],
			'content' => $validated['content'],
			'status' => $validated['status'],
		]);
		
		return redirect()->route('admin');
	}
	// ------------------------------
	public function faqDelete($id){

		$faq = Faq::find($id);
		$faq->delete();

		return redirect()->route('admin');
	}

 // ---------FAQ CONTROL---------

 // ---------?? CONTROL---------

 // ---------?? CONTROL---------


}
