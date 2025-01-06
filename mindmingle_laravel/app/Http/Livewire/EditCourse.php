<?php

namespace App\Http\Livewire;

use App\Models\CourseCategory;
use App\Models\CourseClassType;
use App\Models\CourseMasterclass;
use App\Models\CourseMasterclassLevel;
use App\Models\CoursePriceType;
use Livewire\Component;

class EditCourse extends Component
{
    public $data;

    public function mount($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.edit-course', [
            'categories' => CourseCategory::get(),
            'levels' => CourseMasterclassLevel::get(),
            'prices' => CoursePriceType::get(),
            'classes' => CourseClassType::get(),
            'val' => $this->data,
            'data_course' => CourseMasterclass::where('masterclass_id',$this->data)->first(),
        ]);
    }
}
