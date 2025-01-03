<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Models\CourseClass;
use App\Models\CourseClassType;
use App\Models\CourseMasterclass;
use App\Models\CourseMasterclassLevel;
use App\Models\CoursePriceType;
use Illuminate\Http\Request;
use App\Models\CourseCurriculum;
use App\Models\CourseCurriculumSection;

class CourseController extends Controller
{
    public function index()
    {
        $masterclasses = CourseMasterclass::with('course_class_prices')->paginate(8);
        $categories = CourseCategory::get();
        $price_types = CoursePriceType::get();
        $class_types = CourseClassType::get();
        $masterclass_levels = CourseMasterclassLevel::get();
        return view('courses', compact('masterclasses', 'categories', 'price_types', 'class_types', 'masterclass_levels'));
    }
    public function show($course_slug)
    {

        $masterclass = CourseMasterclass::with(['course_class_types', 'course_categories', 'course_class_prices', 'course_masterclass_levels'])
            ->where('masterclass_slug', $course_slug)->firstOrFail();

        return view('course.detail', compact('masterclass'));
    }
    public function course($course_slug, $curriculum)
    {
        dd($course_slug, $curriculum);
        return view('course.courseLearning');
    }
}
