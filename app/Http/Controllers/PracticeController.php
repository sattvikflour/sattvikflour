<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function viewPractice(){
        return view('website.practice');
    } 
}
