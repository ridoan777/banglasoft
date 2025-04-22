<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Carousel;
use App\Models\Doctor;
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
		$doctorData = Doctor::paginate(5);
		// $doctorData = Doctor::all();

		return view('components.admin.dashboard', [
			'marqueeData' => $marqueeData,
			'faqData' => $faqData,
			'carouselData' => $carouselData,
			'doctorData' => $doctorData,
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

		if ($request->hasFile('slider_img'))
		{
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
	public function carouselEdit($id)
	{

		$carousel = Carousel::find($id);
		$triggerBlock = 'carousel';

		return view('components.partials.admin.edit', [
			'carousel' => $carousel,
			'triggerBlock' => $triggerBlock
		]);
	}
	// ------------------------------
	public function carouselUpdate(Request $request, $id)
	{

		$carousel = Carousel::findOrFail($id);

		$validated = $request->validate([
			'slider_img' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
			'status' => 'required',
		]);

		if ($request->hasFile('slider_img'))
		{
			$slider_img = $request->file('slider_img');

			$imageName = substr(time(), -4) . '.' . $slider_img->getClientOriginalExtension();

			$slider_img->storeAs('admin_files/carousel', $imageName, 'public');

			$validated['slider_img'] = 'storage/admin_files/carousel/' . $imageName;
		}

		$carousel->update($validated);

		return redirect()->route('admin');
	}
	// ------------------------------
	public function carouselDelete($id)
	{

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

		if ($request->status == 1)
		{
			Marquee::where('status', 1)->where('id', '!=', $marquee->id)->update(['status' => 0]);
		}

		$marqueeData = Marquee::all();
		return redirect()->route('admin', compact('marqueeData'));
	}
	// ------------------------------
	public function marqueeEdit($id)
	{

		$marquee = Marquee::find($id);
		$triggerBlock = 'marquee';

		return view('components.partials.admin.edit', [
			'marquee' => $marquee,
			'triggerBlock' => $triggerBlock
		]);
	}
	// ------------------------------
	public function marqueeUpdate(Request $request, $id)
	{

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

		if ($request->status == 1)
		{
			Marquee::where('status', 1)->where('id', '!=', $marquee->id)->update(['status' => 0]);
		}

		$marqueeData = Marquee::all();
		return redirect()->route('admin', compact('marqueeData'));
	}
	// ------------------------------
	public function marqueeDelete($id)
	{

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
	public function faqEdit($id)
	{

		$faq = Faq::find($id);
		$triggerBlock = 'faq';

		return view('components.partials.admin.edit', [
			'faq' => $faq,
			'triggerBlock' => $triggerBlock
		]);
	}
	// ------------------------------
	public function faqUpdate(Request $request, $id)
	{

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
	public function faqDelete($id)
	{

		$faq = Faq::find($id);
		$faq->delete();

		return redirect()->route('admin');
	}

 // ---------FAQ CONTROL---------

 // ---------DOCTOR CONTROL---------
	public function doctorCreate(Request $request)
	{
		$validated = $request->validate([
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:doctors,email',
			'phone' => 'required|max:20|unique:doctors,phone',
			'reg' => 'required|max:100|unique:doctors,reg',
			'degree_1' => 'required|max:100',
			'college_1' => 'required|max:255',
			'degree_2' => 'nullable|max:100',
			'college_2' => 'nullable|max:255',
			'time' => 'nullable|max:100',
			'chamber' => 'nullable|max:255',
			'fee' => 'nullable|integer',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

		if ($request->hasFile('image'))
		{
			$image = $request->file('image');

			$originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

			$trimmedName = substr($originalName, 0, 10);
	  
			$imageName = $trimmedName . '_' . substr(time(), -4) . '.' . $image->getClientOriginalExtension();

			$image->storeAs('admin_files/doctor', $imageName, 'public');

			$validated['image'] = 'storage/admin_files/doctor/' . $imageName;
		}

		$doctor = Doctor::create([
			'name' => $validated['name'],
			'email' => $validated['email'],
			'phone' => $validated['phone'],
			'reg' => $validated['reg'],
			'degree_1' => $validated['degree_1'],
			'college_1' => $validated['college_1'],
			'degree_2' => $validated['degree_2'],
			'college_2' => $validated['college_2'],
			'time' => $validated['time'],
			'chamber' => $validated['chamber'],
			'fee' => $validated['fee'],
			'image' => $validated['image'],
		]);

		return redirect()->route('home')->with('success', 'Doctor record created successfully!');
	}
	// ------------------------------
	public function doctorEdit($id)
	{
		$doctor = Doctor::find($id);
		$triggerBlock = 'doctor';

		return view('components.partials.admin.edit', [
			'doctor' => $doctor,
			'triggerBlock' => $triggerBlock
		]);
	}
	// ------------------------------
	public function doctorUpdate(Request $request, $id)
	{

		$doctor = Doctor::find($id);

		$validated = $request->validate([
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:doctors,email,' . $id,
			'phone' => 'required|max:20|unique:doctors,phone,' . $id,
			'reg' => 'required|max:100|unique:doctors,reg,' . $id,
			'degree_1' => 'required|max:100',
			'college_1' => 'required|max:255',
			'degree_2' => 'nullable|max:100',
			'college_2' => 'nullable|max:255',
			'time' => 'nullable|max:100',
			'chamber' => 'nullable|max:255',
			'fee' => 'nullable|integer',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

		if ($request->hasFile('image'))
		{
			$image = $request->file('image');

			$originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

			$trimmedName = substr($originalName, 0, 10);
	  
			$imageName = $trimmedName . '_' . substr(time(), -4) . '.' . $image->getClientOriginalExtension();

			$image->storeAs('admin_files/doctor', $imageName, 'public');

			$validated['image'] = 'storage/admin_files/doctor/' . $imageName;

			$doctor->update([
				'image' => $validated['image'],
			]);
		}

		$doctor->update([
			'name' => $validated['name'],
			'email' => $validated['email'],
			'phone' => $validated['phone'],
			'reg' => $validated['reg'],
			'degree_1' => $validated['degree_1'],
			'college_1' => $validated['college_1'],
			'degree_2' => $validated['degree_2'],
			'college_2' => $validated['college_2'],
			'time' => $validated['time'],
			'chamber' => $validated['chamber'],
			'fee' => $validated['fee'],
		]);

		return redirect()->route('admin')->header('Location', route('admin') . '#adminDoctor');;
	}
	// ------------------------------
	public function doctorDelete($id)
	{

		$doctor = Doctor::find($id);
		$doctor->delete();

		return redirect()->route('admin')->header('Location', route('admin') . '#adminDoctor');
	}
 // ---------DOCTOR CONTROL---------

	// ---------?? CONTROL---------

	// ---------?? CONTROL---------


}
