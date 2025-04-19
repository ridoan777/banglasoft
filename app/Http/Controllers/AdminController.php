<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Faq;
use App\Models\Marquee;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$marqueeData = Marquee::all();
		$faqData = Faq::all();

		return view('components.admin.dashboard', [
			'marqueeData' => $marqueeData, 
			'faqData' => $faqData
		]);
	}
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


}
