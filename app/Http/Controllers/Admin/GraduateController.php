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
class GraduateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        
        if($role_id==1){
            $users = User::join('universities', 'universities.id', '=', 'users.university_id','left')
            ->where('role_id',3)->get(['users.*', 'universities.uni_name']);
        }
        else{
            $users = User::join('universities', 'universities.id', '=', 'users.university_id')
            ->where('role_id',3)->where('university_id',$university_id)->get(['users.*', 'universities.uni_name']);
        }
        return view('admin.graduates.graduates_list',compact('users','permission_array'));
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
        $university_id = $user['university_id'];

        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
      
        Session::push('permissions', $permission_array);
        $univeristy = University::all();
        return view('admin.graduates.add_graduates',compact('univeristy','permission_array'));
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
                'username'          =>  'required|string',
                'email'             =>  'required|email|unique:users,email',
                'password'          =>  'required|min:6',
                'confirm_password'  =>  'required|min:6|same:password',
                'university_id'     =>  'required',
                'contact'           =>  'required|regex:/^([0-9\s\-\.\(\)]*)$/',
                'gender'            =>  'required', 
                'university_id'     =>  'required',
               // 'zip'             =>  'required',
                //'uni_image'       => 'mimes:jpg,jpeg,png,pdf|max:10000'
            ], 
            [
                'firstname.required'         => 'First Name is required',
                'lastname.required'          => 'Last Name is required',
                'username.required'          => 'Username is required',
                'email.required'             => 'Email is required',
                'password.required'          => 'Password is required',
                'confirm_password.required'  => 'Confirm Password is required',
                'password.min'               => 'To sort, at least 6 characters',
                'confirm_password.min'       => 'To short, at least 6 characters',
                'contact.required'           => 'Contact Number is required',
                'contact.regex'              => 'The Contact Number must be 10 digits.',
                'contact.max'                => 'The Contact Number must be 10 digits.',
                'university_id.required'     => 'University Name is required',
                //'zip.required'             => 'zip Code is required',
            ]
        );

        $profile_image ='';
       if($request->has('student_image')){
            @$profile_image = time().'.'.$request->student_image->getClientOriginalName();  
            $request->student_image->move(public_path('assets/admin/images/student_profile'), $profile_image); 
        }  

        $graduate_resume ='';
        if($request->has('graduate_resume')){
            @$graduate_resume = time().'.'.$request->graduate_resume->getClientOriginalName();  
            $request->graduate_resume->move(public_path('assets/admin/images/student_resume'), $graduate_resume); 
        } 


        $dataArray  = User::create([
   
            "firstName"              =>   $request->firstname,
            "lastName"               =>   $request->lastname,
            "email"                  =>   $request->email,
            "username"               =>   $request->username,
            "role_id"                =>   3,
            "password"               =>   Hash::make($request->password),
            "alternative_email"      =>   $request->alternat_email,
            "contact"                =>   $request->contact,
            "gender"                 =>   $request->gender,
            "zip"                    =>   $request->zip,
            "year_of_joining"        =>   $request->year_of_joining,
            "university_id"          =>   $request->university_id,    
            "status"                 =>   1,    
            "is_online"              =>   1,    
            "image"                  =>   $profile_image ? $profile_image:"",
            "graduate_resume"        =>   $graduate_resume ? $graduate_resume:"",
            //"graduate_resume"      =>   $imageName ? $imageName:"",
          
        ]);

        if($dataArray){

            $data = array( 
                "email"         =>   $request->email,
                "firstName"     =>   $request->firstname,
                "lastName"      =>   $request->lastname,
                "password"      =>   $request->password,
            );
        
            $email        = $request->email;
            $firstName    = $request->firstname;
            $lastName     = $request->lastname;
            $password     = $request->password;
            
            Mail::send('admin.graduates.student_email', $data, function($message) use($email, $firstName,$lastName,$password ) {
                $message->to($email, 'Pathport')->subject
                ('Register');
            
            });
        }
        return redirect()->route('student.create')->with('success','Student Added successfully.');
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
       
        Session::push('permissions', $permission_array);
        $university = University::all();
        return view('admin.graduates.edit_graduates',compact('users','university','permission_array'));  
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

        $request->validate(
            [
                'contact'           => 'regex:/^([0-9\s\-\.\(\)]*)$/',
                'password'          => 'min:6',
                'confirm_password'  => 'min:6|same:password',
                //'uni_image'       => 'mimes:jpg,jpeg,png,pdf|max:10000'
            ], 
            [
                'contact'               => 'Contact Number is required',
                'password.min'          => 'To sort, at least 6 characters',
                'confirm_password.min'  => 'To short, at least 6 characters',
            ]
        );

            $student = User::find($id);

            if($request->has('student_image')){

                @$profile_image = time().'.'.$request->student_image->getClientOriginalName();  
                $request->student_image->move(public_path('assets/admin/images/student_profile'), $profile_image); 
                $student->image = $profile_image ?  $profile_image:"";

            }
            if($request->has('graduate_resume')){

                @$imageName = time().'.'.@$request->graduate_resume->getClientOriginalName();
                @$request->graduate_resume->move(public_path('assets/admin/images/student_resume'), $imageName);
                $student->graduate_resume = $imageName ?  $imageName:"";
                
            }
          
                $student->firstName          = $request->input('firstname');
                $student->lastName           = $request->input('lastname');
                $student->email              = $request->input('email');
                $student->username           = '';
                $student->role_id            = 3;
                $student->password           = Hash::make($request->input('password'));
                $student->alternative_email  = $request->input('alternat_email');
                $student->contact            = $request->input('contact');
                $student->gender             = $request->input('gender');
                $student->year_of_joining    = $request->input('year_of_joining');
                $student->zip                =  $request->input('zip');
                $student->university_id      = $request->input('university_id');
                $student->status             = 1;
                $student->is_online          = 1;
                
            

                $student->save();
                return redirect('student')->with("success","Success Users Edit");

          
       
    
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
        return redirect('student');
    }
}
