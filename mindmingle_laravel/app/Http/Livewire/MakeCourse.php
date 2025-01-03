<?php

namespace App\Http\Livewire;

use App\Models\CourseCategory;
use App\Models\CourseClassType;
use App\Models\CourseMasterclass;
use App\Models\CourseMasterclassLevel;
use App\Models\CoursePriceType;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class MakeCourse extends Component
{
    public $currentStep = 1;
    public $masterclass_name, $masterclass_short_desc,
        $category, $masterclass_level, $class_type, $price_type,
        $masterclass_total_duration, $masterclass_description,
        $masterclass_total_curriculum, $price,
        $curriculum_section_name, $curriculum_name,
        $curriculum_description, $masterclass_video_preview, $masterclass_thumbnail, $curriculum_video = 1;
    public $successMsg = '';

    public function firstStepSubmit()
    {
        $validate = $this->validate([
            'masterclass_name' => 'required|string|max:50',
            'masterclass_short_desc' => 'required|string|max:100',
            'category' => 'required',
            'masterclass_level' => 'required',
            'class_type' => 'required',
            'price_type' => 'required',
            'masterclass_total_duration' => 'required|numeric|max:5',
            'masterclass_description' => 'required|string',
            'masterclass_total_curriculum' => 'required|numeric|max:5',
            'price' => 'nullable|numeric'
        ]);
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validate = $this->validate([
            'masterclass_thumbnail' => 'required|image|file|mimes:jpg,png,jpeg|max:3024',
            'masterclass_video_preview' => 'required|mimes:mp4,webm,mov,avi|max:20000'
        ]);
        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $validate = $this->validate([
            'curriculum_section_name' => 'required|string|max50',
            'curriculum_video' => 'required',
            'curriculum_description' => 'required',
            'curriculum_name' => 'required|string|max:50',
        ]);
        $this->currentStep = 4;
    }

    public function submitForm()
    {
        $masterclass = CourseMasterclass::create([
            'category_id' => $this->category,
            'masterclass_name' => $this->masterclass_name,
            'masterclass_short_desc' => $this->masterclass_short_desc,
            'masterclass_level_id' => $this->masterclass_level,
            'class_type_id' => $this->class_type,
            'price_type_id' => $this->price_type,
            'masterclass_thumbnail' => $this->masterclass_thumbnail->hashName(),
            'masterclass_video_preview' => $this->masterclass_video_preview->hashName(),
            'masterclass_price' => $this->price,
            'masterclass_total_duration' => $this->masterclass_total_duration,
            'masterclass_total_curriculum' => $this->masterclass_total_curriculum,
            'masterclass_description' => $this->masterclass_description,
        ]);
        $curriculum_section = $masterclass->course_curriculum_sections()->create([
            'curriculum_section_name' => $this->curriculum_section_name,
            'section_id_completed' => 1,
        ]);
        $curriculum_section->course_curriculum()->create([
            'curriculum_name' => $this->curriculum_name,
            'curriculum_video' => $this->curriculum_video->hashName(),
            'curriculum_description' => $this->curriculum_description,
            'curriculum_is_completed' => 1,
        ]);

        $this->successMsg = Alert::success('Success', 'New course has been created!');


        $this->clearForm();
        $this->currentStep = 1;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function clearForm()
    {
        $this->category = '';
        $this->masterclass_name = '';
        $this->masterclass_short_desc = '';
        $this->masterclass_level = '';
        $this->class_type = '';
        $this->price_type = '';
        $this->masterclass_thumbnail = '';
        $this->masterclass_video_preview = '';
        $this->masterclass_total_curriculum = '';
        $this->masterclass_total_duration = '';
        $this->masterclass_description = '';
        $this->price = '';
        $this->curriculum_section_name = '';
        $this->curriculum_name = '';
        $this->curriculum_video = '';
        $this->curriculum_description = '';
    }

    public function render()
    {
        return view('livewire.make-course', [
            'categories' => CourseCategory::get(),
            'levels' => CourseMasterclassLevel::get(),
            'prices' => CoursePriceType::get(),
            'classes' => CourseClassType::get()
        ]);
    }
}
