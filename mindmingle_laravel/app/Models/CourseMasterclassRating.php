<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMasterclassRating extends Model
{
    use HasFactory;
    protected $table = 'course_masterclass_ratings';
    protected $primaryKey = 'rating_id';
    protected $fillable = ['masterclass_id', 'user_id'];

}
