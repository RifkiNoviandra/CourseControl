<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMasterclass extends Model
{
    use HasFactory;
    protected $table = 'course_masterclasses';
    protected $primaryKey = 'masterclass_id';
    protected $guarded = [];

    public function course_categories()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id', 'category_id');
    }
    public function course_class_types()
    {
        return $this->belongsTo(CourseClassType::class, 'class_type_id', 'class_type_id');
    }
    public function course_class_prices()
    {
        return $this->belongsTo(CoursePriceType::class, 'price_type_id', 'price_type_id');
    }
    public function course_masterclass_levels()
    {
        return $this->belongsTo(CourseMasterclassLevel::class, 'masterclass_level_id', 'masterclass_level_id');
    }
    public function course_classes()
    {
        return $this->hasMany(CourseClass::class, 'masterclass_id', 'masterclass_id');
    }
    public function course_curriculum_sections()
    {
        return $this->hasMany(CourseCurriculumSection::class, 'masterclass_id', 'masterclass_id');
    }
}
