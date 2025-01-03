<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClassType extends Model
{
    use HasFactory;
    protected $table = 'course_class_types';
    protected $primaryKey = 'class_type_id';
    protected $guarded = [];

    public function course_masterclasses() {
        return $this->hasMany(CourseMasterclass::class, 'class_type_id', 'class_type_id');
    }
}
