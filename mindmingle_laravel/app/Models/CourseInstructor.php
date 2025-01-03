<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInstructor extends Model
{
    use HasFactory;

    protected $table = 'course_instructors';
    protected $primaryKey = 'instructor_id';
    protected $fillable = [
        'instructor_full_name',
        'instructor_email',
        'instructor_password',
        'instructor_picture',
        'instructor_phone',
        'instructor_status',
        'role_id',
    ];

    public function course_classes()
    {
        return $this->hasMany(CourseClass::class, 'instructor_id', 'instructor_id');
    }

    public function course_certificates()
    {
        return $this->belongsTo(CourseCertificate::class, 'instructor_id', 'instructor_id');
    }
}
