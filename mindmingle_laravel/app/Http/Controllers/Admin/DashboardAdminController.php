<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseMasterclass;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $students = User::whereHas('roles', function ($query) {
            $query->where('role_name', 'Student');
        })->count();

        $studentsNew = User::whereHas('roles', function ($query) {
            $query->where('role_name', 'Student');
        })->whereDate('created_at', Carbon::today())->count();


        $instructors = User::whereHas('roles', function ($query) {
            $query->where('role_name', 'Instructor');
        })->count();

        $instructorsNew = User::whereHas('roles', function ($query) {
            $query->where('role_name', 'Instructor');
        })->whereDate('created_at', Carbon::today())->count();

        $masterclasses = CourseMasterclass::count();

        $masterclassesNew = CourseMasterclass::whereDate('created_at', Carbon::today())->count();

        return view('admin.dashboard', compact('students', 'masterclassesNew', 'studentsNew', 'instructorsNew', 'instructors', 'masterclasses'));
    }
}
