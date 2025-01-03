<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\CourseClassType;
use App\Models\CourseMasterclassLevel;
use App\Models\CoursePriceType;
use Illuminate\Http\Request;

class MakeCourseController extends Controller
{
    public function index()
    {
        return view('instructor.makeCourse');
    }
    public function show()
    {
        return view('instructor.myCourse');
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
        dd($request);
    }
}
