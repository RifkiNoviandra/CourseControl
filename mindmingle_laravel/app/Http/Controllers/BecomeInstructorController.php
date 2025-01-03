<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BecomeInstructorController extends Controller
{
    public function index() {
        return view('become');
    }

}
