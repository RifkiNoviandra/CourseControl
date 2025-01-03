<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;
    protected $table = 'course_categories';
    protected $primaryKey = 'category_id';
    protected $guarded = [];

    public function course_masterclasses()
    {
        return $this->hasMany(CourseMasterclass::class, 'category_id', 'category_id');
    }
}
