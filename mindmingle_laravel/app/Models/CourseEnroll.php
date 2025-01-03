<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseEnroll extends Model
{
    use HasFactory;

    protected $table = 'course_enrolls';
    protected $primaryKey = 'enroll_id';
    protected $guarded = [];

    public function course_classes()
    {
        return $this->belongsTo(CourseClass::class, 'class_id', 'class_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function course_instructors()
    {
        return $this->belongsTo(CourseInstructor::class, 'instructor_id', 'instructor_id');
    }
}
