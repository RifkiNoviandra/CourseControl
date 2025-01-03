<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    use HasFactory;
    protected $table = 'course_classes';
    protected $primaryKey = 'class_id';
    protected $guarded = [];

    public function course_masterclasses() {
        return $this->belongsTo(CourseMasterclass::class, 'masterclass_id', 'masterclass_id');
    }

}
