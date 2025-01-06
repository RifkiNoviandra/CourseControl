<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\CourseClassType;
use App\Models\CourseMasterclass;
use App\Models\CourseMasterclassLevel;
use App\Models\CoursePriceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class MakeCourseController extends Controller
{
    public function index()
    {
        return view('instructor.makeCourse');
    }

    public function show()
    {
        $data = CourseMasterclass::where('user_id', Auth::user()->id)->get();

        return view('instructor.myCourse')->with('data', $data);
    }

    public function edit(Request $request, $id)
    {
        $data = CourseMasterclass::find($id);
        $categories = CourseCategory::get();
        $levels = CourseMasterclassLevel::get();
        $prices = CoursePriceType::get();
        $classes = CourseClassType::get();

        return view('instructor.editCourses')->with('data', $id)->with('categories', $categories)->with('levels', $levels)->with('prices', $prices)->with('classes', $classes);
    }

    public function create()
    {
        $categories = CourseCategory::get();
        $levels = CourseMasterclassLevel::get();
        $prices = CoursePriceType::get();
        $classes = CourseClassType::get();
        return view('instructor.makeCourse', compact('categories', 'levels', 'prices', 'classes'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'masterclass_name' => 'required|string|unique:course_masterclasses|max:80',
            'masterclass_short_description' => 'required|string|max:120',
            'category_id' => 'required',
            'masterclass_level_id' => 'required',
            'class_type_id' => 'required',
            'price_type_id' => 'required',
            'image_thumb' => 'required|image|file|mimes:jpg,png,jpeg|max:2024',
            'masterclass_price' => 'nullable|string',
            'masterclass_discount' => 'nullable|string',
            'masterclass_total_duration' => 'nullable|string|min:7|max:7',
            'masterclass_total_curriculum' => 'required',
            'masterclass_description' => 'required|string',
            'vid_prev' => 'required|file|mimes:mp4,mkv,mov|max:20000'
        ]);

        $thumb = $request->file('image_thumb');
        $prev = $request->file('vid_prev');

        $name_thumb = \Illuminate\Support\Str::random(7) . "_" . $thumb->getClientOriginalName();
        $request->image_thumb->move(public_path() . "/masterclass/thumbnails", $name_thumb);

        $name_prev = \Illuminate\Support\Str::random(7) . "_" . $prev->getClientOriginalName();
        $request->vid_prev->move(public_path() . "/masterclass/previews", $name_prev);

        $masterclass = CourseMasterclass::create([
            'user_id' => Auth::user()->id,
            'masterclass_name' => $validate['masterclass_name'],
            'masterclass_short_desc' => $validate['masterclass_short_description'],
            'masterclass_slug' => Str::slug($validate['masterclass_name']),
            'masterclass_level_id' => $validate['masterclass_level_id'],
            'class_type_id' => $validate['class_type_id'],
            'price_type_id' => $validate['price_type_id'],
            'masterclass_price' => $request->masterclass_price,
            'category_id' => $validate['category_id'],
            'masterclass_thumbnail' => $name_thumb,
            'masterclass_video_preview' => $name_prev,
            'masterclass_description' => $validate['masterclass_description'],
            'masterclass_total_duration' => $validate['masterclass_total_duration'],
            'masterclass_total_curriculum' => $validate['masterclass_total_curriculum'],
            'masterclass_discount' => $request->masterclass_discount,
        ]);

        if ($masterclass) {
            Alert::success('Success', 'New masterclass has been created!');
        } else {
            Alert::error('Error', 'Failed to add masterclass!');
            return redirect()->route('instructor.mycourse')->with('error', 'Failed to add masterclass!');
        }
        return redirect()->route('instructor.mycourse')->with('message', 'New masterclass has been created');
    }

    function update(Request $request, $id){
        $data = CourseMasterclass::find($id);

        $validate = $request->validate([
            'masterclass_name' => 'required|string|unique:course_masterclasses|max:80',
            'masterclass_short_description' => 'required|string|max:120',
            'category_id' => 'required',
            'masterclass_level_id' => 'required',
            'class_type_id' => 'required',
            'price_type_id' => 'required',
            'masterclass_price' => 'nullable|string',
            'masterclass_discount' => 'nullable|string',
            'masterclass_total_duration' => 'nullable|string|min:7|max:7',
            'masterclass_total_curriculum' => 'required',
            'masterclass_description' => 'required|string',
        ]);

        $name_thumb = $data->masterclass_thumbnail;
        $name_prev = $data->masterclass_video_preview;

        if ($request->file('image_thumb')) {
            $thumb = $request->file('image_thumb');
            $name_thumb = \Illuminate\Support\Str::random(7) . "_" . $thumb->getClientOriginalName();
            $request->image_thumb->move(public_path() . "/masterclass/thumbnails", $name_thumb);
        }

        if ($request->file('vid_prev')) {
            $prev = $request->file('vid_prev');
            $name_prev = \Illuminate\Support\Str::random(7) . "_" . $prev->getClientOriginalName();
            $request->vid_prev->move(public_path() . "/masterclass/previews", $name_prev);
        }

        if ($validate['masterclass_price'] == 1) {
            $price = 0;
        }else{
            $price = $request->masterclass_price;
        }

        $masterclass = $data->update([
            'masterclass_name' => $validate['masterclass_name'],
            'masterclass_short_desc' => $validate['masterclass_short_description'],
            'masterclass_slug' => Str::slug($validate['masterclass_name']),
            'masterclass_level_id' => $validate['masterclass_level_id'],
            'class_type_id' => $validate['class_type_id'],
            'price_type_id' => $validate['price_type_id'],
            'masterclass_price' => $price,
            'category_id' => $validate['category_id'],
            'masterclass_thumbnail' => $name_thumb,
            'masterclass_video_preview' => $name_prev,
            'masterclass_description' => $validate['masterclass_description'],
            'masterclass_total_duration' => $validate['masterclass_total_duration'],
            'masterclass_total_curriculum' => $validate['masterclass_total_curriculum'],
            'masterclass_discount' => $request->masterclass_discount,
        ]);

        if ($masterclass) {
            Alert::success('Success', 'Masterclass Updated!');
        } else {
            Alert::error('Error', 'Failed to add masterclass!');
            return redirect()->route('instructor.mycourse')->with('error', 'Failed to update masterclass!');
        }
        return redirect()->route('instructor.mycourse')->with('message', 'Masterclass Updated');
    }

    function delete(Request $request, $id){
        $data = CourseMasterclass::find($id);

        $delete = $data->delete();

        if ($delete) {
            Alert::success('Success', 'Class Deleted!');
        } else {
            Alert::error('Error', 'Failed to add masterclass!');
            return redirect()->route('instructor.mycourse')->with('error', 'Failed to Delete Class!');
        }
        return redirect()->route('instructor.mycourse')->with('message', 'Class Deleted!');
    }
}
