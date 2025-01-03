<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        if (Auth::check() && Auth::user()->role_id == 1) {
            return redirect()->route('admin.dashboard');
        } else if (Auth::check() && Auth::user()->role_id == 2) {
            return redirect()->route('student.index');
        } else if (Auth::check() && Auth::user()->role_id == 3) {
            return redirect()->route('instructor.index');
        } else {
            return redirect('login');
        }
    }
}
