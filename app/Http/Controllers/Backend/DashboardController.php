<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\University;
use App\Models\User;

class DashboardController extends Controller
{
    

    public function index()
    {
        return view('backend.dashboard');
       /*$user = Auth::guard('backend')->user();
       $uni_id = $user['university_id'];
       $role_id = $user['role_id'];

        //Fetch slug from University Table
        $slug_data = University::select('uni_slug')->where('id',$uni_id)->get();
        
        @$slug = $slug_data[0]['uni_slug']; 

       // return view('backend.dashboard');
        if($role_id == 1){
            return view('backend.dashboard');
        }
        else{
            return redirect()->intended(route('backend.dashboard', [$slug]));
        }*/
        
    }
}
