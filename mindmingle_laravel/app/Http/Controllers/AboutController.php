<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function basicschool() {
        return view('aboutBasic');
    }

    public function about() {
        return view('aboutUs');
    }

    public function contact() {
        return view('contact');
    }



}
