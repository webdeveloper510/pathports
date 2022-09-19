<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\University;
use App\Models\User;
use App\Models\Assign_permission;
use App\Models\Permissions;
use App\Models\Mentor;
use Auth;
use Mail;
use Session;
class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth',['except'=>['hello','hello2']]);
    }

    public function index()
    {
        
        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];
        $university_id = $user['university_id'];
        $user_id = $user['id'];
        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();


        $alumni_data = User::where('role_id',4)->select('image','firstname','lastname','id')->get();
       
        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        Session::push('permissions', $permission_array);
        //$mentor_data = Mentor::where('user_id',$user_id)->where('type',1)->get();

        $mentor_data = Mentor::join('users', 'users.id', '=', 'mentors.mentor_id')
            ->where('mentors.role_id',4)->where('mentors.type',1)->where('mentors.user_id',$user_id)->get(['users.image', 'mentors.*']);

       
        $offcampus_mentor_data = Mentor::where('role_id',4)->where('type',0)->where('user_id',$user_id)->get();

        return view('admin.mentors.add_mentors',compact('permission_array','alumni_data','mentor_data','offcampus_mentor_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeMentors(Request $request){

     $request->validate(
            [
                'off_campus' =>  'required',
                'on_campus' =>  'required',
                
            ],
            // [
                
            //     'off_campus.required'  => 'Off Campus is required',
            //     'on_campus.required'  => 'On Campus is required',
            //     'on_campus.max'  => 'Please Select Maximum 5 Values',
                
            // ]
        );

        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];
        $university_id = $user['university_id'];
        $user_id = $user['id'];

        $off_campus_mentors = $request->off_campus_mentors;
        $on_campus_mentorsId = $request->on_campus_mentorsId;
        //$on_campus_mentorsName = $request->on_campus_mentorsName;

        

            if($off_campus_mentors){
                $insert_data = Mentor::create([
                    "mentor_id" => "",
                    "user_id"  =>  Auth::user()->id,
                    "role_id"  =>  4,
                    "mentor_name" => $off_campus_mentors,
                    "type" => 0,
                    'status'  => 1,
                ]);
            }
            $delete_data = Mentor::where('user_id',$user_id)->where('type',1)->delete();

            foreach($on_campus_mentorsId as $mentor_ids){

                $mentors_data = User::select('firstname','lastname','image')->where('id',$mentor_ids)->get();
             
                    $insert_data = Mentor::create([
                        "mentor_id" => $mentor_ids,
                        "user_id" => Auth::user()->id,
                        "role_id"  =>   4,
                        "mentor_name" => $mentors_data[0]['firstname']." ".$mentors_data[0]['lastname'],
                        "type" => 1,
                        "status"  => 1, 
                    ]);
            }
        return redirect()->back()->with('success','Mentors Added successfully.');
        
    }
}
