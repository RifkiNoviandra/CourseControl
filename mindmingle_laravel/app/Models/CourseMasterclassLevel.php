<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMasterclassLevel extends Model
{
    use HasFactory;
    protected $table = 'course_masterclass_levels';
    protected $primaryKey = 'masterclass_level_id';
    protected $guarded = [];

    public function course_masterclasses() {
        return $this->hasMany(CourseMasterclass::class, 'masterclass_level_id', 'masterclass_level_id');
    }
}
