<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCurriculumSection extends Model
{
    use HasFactory;
    protected $table = 'course_curriculum_sections';
    protected $primaryKey = 'curriculum_section_id';
    protected $guarded = [];

    public function course_masterclasses()
    {
        return $this->belongsTo(CourseMasterclass::class, 'masterclass_id', 'masterclass_id');
    }
    public function course_curriculums()
    {
        return $this->hasMany(CourseCurriculum::class, 'curriculum_section_id', 'curriculum_section_id');
    }
}
