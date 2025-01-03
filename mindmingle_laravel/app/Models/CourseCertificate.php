<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCertificate extends Model
{
    use HasFactory;

    protected $table = 'course_certificates';
    protected $primaryKey = 'certificate_id';
    protected $guarded = [];

    public function course_masterclasses()
    {
        return $this->hasMany(CourseMasterclass::class, 'masterclass_id', 'masterclass_id');
    }

    public function course_instructors()
    {
        return $this->hasOne(CourseInstructor::class, 'instructor_id', 'instructor_id');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
