<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class CollegeController extends Controller
{
    public function index(){
        return view('admin.university.college.index');
    }
}
