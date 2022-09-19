<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\University;
use App\Models\Assign_permission;
use App\Models\Permissions;
use App\Models\User;
use Auth;
use Mail;
use Session;


class UserController extends Controller
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
        Session::push('permissions', $permission_array);
        $users = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')->get(['users.*', 'roles.name']);
        
        $data = compact('users','permission_array');
        return view('admin.university.users.index')->with($data);
    }

    public function users_view($id)
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
        //$users = User::all();
        //$users = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')->where(['role_id'=>2,'university_id'=>$id])->get(['users.*', 'roles.name']);  //commented a
        $role_ids = ['2','6','7','8'];
        $users = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')->where(['university_id'=>$id])->whereIn('role_id',$role_ids)->get(['users.*', 'roles.name']);
        $data = compact('users','id','permission_array');
        return view('admin.university.users.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function create(){

    }
    public function store(){

    }
    public function create_user($id)
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
        $university = University::all();
        $data = compact('university','id','permission_array');
        return view('admin.university.users.addusers')->with($data);  
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function store_user(Request $request,$id)
    {
        //dd($request->firstName);

        $request->validate(
            [
                'firstName'  => 'required|string|max:255',
                'lastName'   =>  'required|string|max:255',    
                'username'  =>  'required|string',
                'email'   =>  'required|email|unique:users,email',
                'password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:password',
                'role_id' => 'required',
                //'uni_image' => 'mimes:jpg,jpeg,png,pdf|max:10000'
            ], 
            [
                'firstName.required' => 'First Name is required',
                'lastName.required' => 'Last Name is required',
                'username.required' => 'Username is required',
                'email.required' => 'Email is required',
                'email.unique' => 'The email has already been taken',
                'password.min'=> 'To sort, at least 6 characters',
                'confirm_password.min'=> 'To short, at least 6 characters',
                'password.required' => 'Password is required',
                'confirm_password.required' => 'Confirm Password is required',
                'role_id.required' => 'Role is required',
            ]
        );
      
        $imageName ='';
        if($request->has('image')){
            @$imageName = time().'.'.$request->image->extension();  

            $request->image->move(public_path('assets/admin/images/profile'), $imageName);

        }
        
      

        $dataArray  = User::create([
       
            "firstName"  =>   $request->firstName,
            "lastName" =>   $request->lastName,
            "username"   =>  $request->username,
            "email" =>  $request->email,
            "password" =>  Hash::make($request->password),
            "role_id" =>  $request->role_id,    
            "university_id" =>  $id,    
            "status" =>  1,    
            "is_online" =>  1,    
            "image"  =>  $imageName ? $imageName:"",
        ]);

        if($dataArray){

            $data = array( 
                        "email"         =>  $request->email,
                        "firstName"     =>   $request->firstName,
                        "lastName"      =>   $request->lastName,
            );
        
            $email        = $request->email;
            $firstName    = $request->firstName;
            $lastName     =   $request->lastName;
            
            Mail::send('admin.auth.register_email', $data, function($message) use($email, $firstName,$lastName ) {
                $message->to($email, 'Pathport')->subject
                ('Register');
            
            });
        }
        //return redirect()->route('users.create')->with('success','User Added successfully.');
        return redirect()->back()->with('success','Staff Added successfully.');


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
        $university_id = $user['university_id'];

        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        //$request->session()->put('permissions', $permission_array);
        Session::push('permissions', $permission_array);
        $university_data = User::select('university_id')->where('id',$id)->get();
        $university_id = $university_data[0]['university_id'];
        $university = University::all();

        return view('admin.university.users.editusers',compact('users','university','university_id','permission_array'));  
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
        

        if($request->has('image')){
            @$imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/admin/images/profile'), $imageName);
                $data = array(
                    "firstName"      => $request->firstName,
                    "lastName"     => $request->lastName,
                    "username"      => $request->username,
                    "email"   => $request->email,
                    "password"   => Hash::make($request->password),
                    //"university_id"   => $request->university_id,
                    "role_id"   => $request->role_id,
                    "image"   => $imageName ? $imageName:"",
                );
            
            $update = User::where('id',$id)->update($data); 
            if($update){
                return redirect()->back()->with("success","Staff Updated Successfully");
            }
        }
        else{
            $data = array(
                    "firstName"      => $request->firstName,
                    "lastName"     => $request->lastName,
                    "username"      => $request->username,
                    "email"   => $request->email,
                    "password"   => Hash::make($request->password),
                    "role_id"   => $request->role_id,
               );
            
            $update = User::where('id',$id)->update($data); 
            if($update){
                return redirect()->back()->with("success","Success Users Upadated");
            }
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
        return redirect()->back();
        
    }
    public function profile($id)
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
        Session::push('permissions', $permission_array);
        $data = compact('permission_array');
        return view('admin.auth.profile')->with($data); 
    }
    public function profile_update(Request $request, $id)
    {
       // dd($request->all());die;
       
        $request->validate(
            [
                'contact' =>  'regex:/^([0-9\s\-\.\(\)]*)$/',
            ], 
            
            [
                'contact.regex' => 'The Contact Number must be 10 digits.',
            ]
        );

        @$imageName ='';
        if($request->has('image')){
            
            @$imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/admin/images/profile'), $imageName);

            $data = array(
                        "firstName"      => $request->firstName,
                        "lastName"     => $request->lastName,
                        "userName"      => $request->userName,
                        "email"   => $request->email,
                        "contact"   => $request->contact,
                        "password"   => Auth::user()->password,
                        "university_id"   =>  Auth::user()->university_id,
                        "image"   =>  $imageName ? $imageName: Auth::user()->image,

                        "gender" =>  $request->gender,
                        "race" =>  $request->race,
                        "lgbq" =>  $request->lgbq,
                        "veteran" =>  $request->veteran,
                        "green_card" =>  $request->green_card,
                        "born_raised_us" =>  $request->born_raised_us,
                        "born_raised_global" =>  $request->born_raised_global,
                        "location_global" =>  $request->location_global,
                        "education_level" =>  $request->education_level,
           
            );

        }
        else{
             
             $data = array(
                        "firstName"      => $request->firstName,
                        "lastName"     => $request->lastName,
                        "userName"      => $request->userName,
                        "email"   => $request->email,
                        "contact"   => $request->contact,
                        "password"   => Auth::user()->password,
                        "university_id"   =>  Auth::user()->university_id,
                        
                        "gender" =>  $request->gender,
                        "race" =>  $request->race,
                        "lgbq" =>  $request->lgbq,
                        "veteran" =>  $request->veteran,
                        "green_card" =>  $request->green_card,
                        "born_raised_us" =>  $request->born_raised_us,
                        "born_raised_global" =>  $request->born_raised_global,
                        "location_global" =>  $request->location_global,
                        "education_level" =>  $request->education_level,
           
                    );
        }
      
          
        $update = User::where('id',$id)->update($data); 
        if($update){
            return redirect()->back()->with("success","Profile Updated successfully");
        }
    }

}
