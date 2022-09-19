<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\University;
use App\Models\User;
use App\Models\Assign_permission;
use App\Models\Permissions;
use Auth;
use Mail;
use Session;

class BoosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];

        $university_id = $user['university_id'];
        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        //$request->session()->put('permissions', $permission_array);
        Session::push('permissions', $permission_array);
        if($role_id == 1){
           
            $users = User::join('universities', 'universities.id', '=', 'users.university_id','left')
            ->where('role_id',5)->get(['users.*', 'universities.uni_name']);
        }
        else{
            $users = User::join('universities', 'universities.id', '=', 'users.university_id')
            ->where('role_id',5)->where('university_id',$university_id)->get(['users.*', 'universities.uni_name']);
        }
        
        
      
        return view('admin.booster.booster_list',compact('users','permission_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];
      
        $univeristy = University::all();
        $university = University::all();
        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        //$request->session()->put('permissions', $permission_array);
        Session::push('permissions', $permission_array);
        return view('admin.booster.add_booster',compact('univeristy','role_id','permission_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate(
            [
                'firstname'         =>  'required|string|max:255',
                'lastname'          =>  'required|string|max:255',    
                'username'       =>  'required|string',
                'email'             =>  'required|email|unique:users,email',
                'password'          =>  'required|min:6',
                'confirm_password' => 'required|min:6|same:password',
                //'university_id'     =>  'required',
                'contact'           =>  'required|regex:/^([0-9\s\-\.\(\)]*)$/',
                'gender'            =>  'required', 
                // 'university_id'   =>  'required',
            ], 
            [
                'firstName.required' => 'First Name is required',
                'lastName.required'  => 'Last Name is required',
                'username.required'  => 'Username is required',
                'email.required'     => 'Email is required',
                'email.unique'     => 'The email has already been taken',
                'password.required'  => 'Password is required',
                'password.min'  => 'To short , at least 6 characters',
                'confirm_password.required' => 'Confirm Password is required',
                'confirm_password.min'=> 'To short, at least 6 characters',
                'contact.required'            => 'Contact Number is required',
                'contact.regex' => 'The Contact Number must be 10 digits.',
            ]
        );
       
        
        $dataArray  = User::create([
       
            "firstName"  =>   $request->firstname,
            "lastName" =>   $request->lastname,
            "email" =>  $request->email,
            "username" =>$request->username,
            "role_id" =>5,
            "password"=> Hash::make($request->password),
            "alternative_email" =>  $request->alternat_email,
            "contact" =>  $request->contact,
            "gender" =>  $request->gender,
            "university_id" =>  $request->university_id ? $request->university_id:"",    
            "status" =>  1,    
            "is_online" =>  1,      
        ]);
        
        if($dataArray){

            $data = array( 
                        "email"         =>  $request->email,
                        "firstName"     =>   $request->firstname,
                        "lastName"      =>   $request->lastname,
            );
        
            $email        = $request->email;
            $firstName    = $request->firstname;
            $lastName     =   $request->lastname;
            
            Mail::send('admin.booster.register_email', $data, function($message) use($email, $firstName,$lastName ) {
                $message->to($email, 'Pathport')->subject
                ('Register');
            
            });
        }
        return redirect()->route('booster.create')
                        ->with('success','Booster Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];
        $university = University::all();
        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        //$request->session()->put('permissions', $permission_array);
        Session::push('permissions', $permission_array);
        return view('admin.booster.edit_booster',compact('users','university','role_id','permission_array'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());die;
        $request->validate(
            [
                'contact'           =>  'required|regex:/^([0-9\s\-\.\(\)]*)$/',
                'password'          =>  'min:6',
                'confirm_password' => 'min:6|same:password',
                //'uni_image' => 'mimes:jpg,jpeg,png,pdf|max:10000'
            ],
            [
                'contact.regex' => 'The Contact Number must be 10 digits.',
                'password.required'  => 'Password is required',
                'password.min'  => 'To short , at least 6 characters',
                'confirm_password.required' => 'Confirm Password is required',
                'confirm_password.min'=> 'To short, at least 6 characters',
            ]
           
        );
        
        
        $data = array(
            "firstName"  =>   $request->firstname,
            "lastName" =>   $request->lastname,
            "email" =>  $request->email,
            "username" =>$request->username,
            "role_id" =>5,
            "password"=> Hash::make($request->password),
            "alternative_email" =>  $request->alternat_email,
            "contact" =>  $request->contact,
            "gender" =>  $request->gender,
            "university_id" =>  $request->university_id ? $request->university_id:"",    
            "status" =>  1,    
            "is_online" =>  1,    
        );
  
        $update = User::where('id',$id)->update($data); 
        if($update){
            return redirect('booster')->with("success","Success Users Edit");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        if(!is_null($users)){
            $users->delete();
        }
        return redirect('booster');
    }
}
