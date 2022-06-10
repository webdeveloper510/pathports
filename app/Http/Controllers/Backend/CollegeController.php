<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class CollegeController extends Controller
{
    public function index(){
        return view('backend.university.college.index');
    }
}
