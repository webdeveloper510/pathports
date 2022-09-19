<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\University;
use App\Models\User;
use App\Models\Assign_permission;
use App\Models\Permissions;
use App\Models\AlumniAval;
use Auth;
use Mail;
use Session;

class AluminiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user              = Auth::guard('web')->user();
        $role_id           = $user['role_id'];
        $university_id     = $user['university_id'];
        $all_permissions   = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array  = array();

        foreach($assign_permission as $per){

            array_push($permission_array,$per->permission_id);
        }
        
        Session::push('permissions', $permission_array);
        if($role_id == 1){

            $users = User::join('universities', 'universities.id', '=', 'users.university_id','left')
                                    ->where('role_id',4)
                                    ->get(['users.*', 'universities.uni_name']);
        }
        else{

            $users = User::join('universities', 'universities.id', '=', 'users.university_id')
                                    ->where('role_id',4)
                                    ->where('university_id',$university_id)
                                    ->get(['users.*', 'universities.uni_name']);
        }
       
            return view('admin.alumini.alumini_list',compact('users','permission_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user               = Auth::guard('web')->user();
        $role_id            = $user['role_id'];
        $university_id      = $user['university_id'];
        $all_permissions    = Permissions::all();
        $assign_permission  = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array   = array();

        foreach($assign_permission as $per){

            array_push($permission_array,$per->permission_id);
        }
        Session::push('permissions', $permission_array);

        $univeristy        = University::all();

        return view('admin.alumini.add_alumini',compact('univeristy','permission_array'));
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
                'firstname'           =>  'required|string|max:255',
                'lastname'            =>  'required|string|max:255',    
                'username'            =>  'required|string',
                'email'               =>  'required|email|unique:users,email',
                'password'            =>  'required|min:6',
                'confirm_password'    =>  'required|min:6|same:password',
                'university_id'       =>  'required',
                //'contact'           =>  'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'contact'             =>  'required|regex:/^([0-9\s\-\.\(\)]*)$/',
                'jobtitle'            =>  'required',
                'zip'                 =>  'required',
                'gender'              =>  'required', 
                'university_id'       =>  'required',
                //'uni_image'         =>  'mimes:jpg,jpeg,png,pdf|max:10000',
                'graduate_resume'     =>  'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
            ], 
            [
                'firstName.required'         =>  'First Name is required',
                'lastName.required'          =>  'Last Name is required',
                'username.required'          =>  'Username is required',
                'email.required'             =>  'Email is required',
                'email.unique'               =>  'The email has already been taken',
                'password.min'               =>  'To sort, at least 6 characters',
                'confirm_password.min'       =>  'To short, at least 6 characters',
                'password.required'          =>  'Password is required',
                'confirm_password.required'  =>  'Confirm Password is required',
                'contact.required'           =>  'Contact Number is required',
                'contact.regex'              =>  'The Contact Number must be 10 digits.',
                'jobtitle.required'          =>  'The Job Title is required',
                'zip.required'               =>  'Zip Code is required',
                'university_id.required'     =>  'University Name is required',
            ]
        );
       
        $imageName='';
        if($request->has('graduate_resume')){
            @$imageName = time().'.'.$request->graduate_resume->getClientOriginalName();  
            $request->graduate_resume->move(public_path('assets/admin/images/alumini/resume'), $imageName);
        }

        $profile_image ='';
        if($request->has('student_image')){
            @$profile_image = time().'.'.$request->student_image->extension();  
            $request->student_image->move(public_path('assets/admin/images/alumini/profile/'), $profile_image); 
        }  

        $dataArray  = User::create([
       
            "firstName"          =>  $request->firstname,
            "lastName"           =>  $request->lastname,
            "email"              =>  $request->email,
            "username"           =>  $request->username,
            "role_id"            =>  4,
            "password"           =>  Hash::make($request->password),
            "alternative_email"  =>  $request->alternat_email,
            "contact"            =>  $request->contact,
            "jobtitle"           =>  $request->jobtitle,
            "gender"             =>  $request->gender,
            "year_of_joining"    =>  $request->year_of_joining,
            "zip"                =>  $request->zip,
            "image"              =>  $profile_image ? $profile_image:"",
            // "graduate_resume" =>  $graduate_resume ? $graduate_resume:"",
            "graduate_resume"    =>  $imageName ? $imageName:"",
            "university_id"      =>  $request->university_id,    
            "status"             =>  1,    
            "is_online"          =>  1,      
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
            
            Mail::send('admin.alumini.register_email', $data, function($message) use($email, $firstName,$lastName ) {
                        $message->to($email, 'Pathport')
                                ->subject('Register');
            
            });
        }
        return redirect()->route('alumni.create')->with('success','Alumini Added successfully.');
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
        $users             =   User::find($id);
        $user              =   Auth::guard('web')->user();
        $role_id           =   $user['role_id'];
        $university_id     =   $user['university_id'];
        $all_permissions   =   Permissions::all();
        $assign_permission =   Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array  =  array();

        foreach($assign_permission as $per){

            array_push($permission_array,$per->permission_id);
        }

        Session::push('permissions', $permission_array);

        $university = University::all();
        return view('admin.alumini.edit_alumini',compact('users','university','permission_array'));  
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
                //'email'             =>  'email|unique:users,email',
                'contact'             =>  'regex:/^([0-9\s\-\.\(\)]*)$/',
               // 'password'          =>  'min:6',
              //  'confirm_password'  => 'min:6|same:password',
            //   'graduate_resume'       =>  'mimes:pdf,xlx,csv|max:2048'
            'graduate_resume'     =>  'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',

            ],
            [
                //'email.unique'      => 'The email has already been taken',
               // 'password.min'      => 'To sort, at least 6 characters',
               // 'confirm_password.min'=> 'To short, at least 6 characters',
                'contact.regex'       => 'The Contact Number must be 10 digits.',
            ]

           
        );
        
        $alumni = User::find($id);

        if($request->has('student_image')){
            @$profile_image = time().'.'.$request->student_image->getClientOriginalName();  
            $request->student_image->move(public_path('assets/admin/images/alumini/profile/'), $profile_image); 
            $alumni->image = $profile_image ?  $profile_image:"";
        }
        if($request->has('graduate_resume')){
            @$imageName = time().'.'.@$request->graduate_resume->getClientOriginalName();
            @$request->graduate_resume->move(public_path('assets/admin/images/alumini/resume/'), $imageName);
            $alumni->graduate_resume = $imageName ?  $imageName:"";
        }
                    
        $alumni->firstName          = $request->input('firstname');
        $alumni->lastName           = $request->input('lastname');
        $alumni->email              = $request->input('email');
        $alumni->username           = $request->input('username');
        $alumni->role_id            = 4;
        $alumni->password           = Hash::make($request->input('password'));
        $alumni->alternative_email  = $request->input('alternat_email');
        $alumni->contact            = $request->input('contact');
        $alumni->jobtitle           = $request->input('jobtitle');
        $alumni->gender             = $request->input('gender');
        $alumni->year_of_joining    = $request->input('year_of_joining');
        $alumni->zip                = $request->input('zip');
        $alumni->university_id      = $request->input('university_id');
        $alumni->status             = 1;
        $alumni->is_online          = 1;
                
        $alumni->update();
        return redirect('alumni')->with("success","Success Users Edit");
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
        return redirect('alumni');
    }

    public function add_availability(){
        $user                = Auth::guard('web')->user();
        $role_id             = $user['role_id'];
        $university_id       = $user['university_id'];
        $user_id             = $user['id'];
        $all_permissions     = Permissions::all();
        $assign_permission   = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array    = array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        Session::push('permissions', $permission_array);
        $avail_exist = AlumniAval::where('user_id',$user_id)->get();

        return view('admin.alumini.add_availability',compact('permission_array','avail_exist'));

    }
    public function addavailability(Request $request){

        $user            = Auth::guard('web')->user();
        $user_id         = $user['id'];
        $dates           = $request->input('date');
        //$date = date('y-m-d', strtotime($date1));
        
        $date_data      = explode(", ", $dates);
        $delete_data    = AlumniAval::where('user_id',$user_id)->delete();
        
        foreach($date_data as $date){
            $date       = date('y-m-d', strtotime($date));

            $dataArray  = AlumniAval::create([
       
                        "user_id"     =>  auth()->user()->id,
                        "date"        =>  $date,
                        "start_time"  =>  "",
                        "end_time"    =>  "",
                        "status"      =>  1,    
            ]);
        }
        return redirect()->route('addavailability')
                         ->with('success','Availability Added Successfully.');
         
    }
}
