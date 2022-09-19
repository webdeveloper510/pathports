<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\University;
use App\Models\User;
use App\Models\Assign_permission;
use App\Models\Permissions;
use App\Models\Meeting;
use App\Models\Agenda;
use App\Models\UserInterestAreas;
use App\Models\AlumniAval;
use Auth;
use Mail;
use Session;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
     
        
        $user = Auth::guard('web')->user();
        $user_id = $user['id'];
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

        $univeristy = University::all();
        
        if($role_id == 1){
            $meeting_data = Meeting::all();
        }
        if($role_id == 2){
            $meeting_data = Meeting::where('university_id',$university_id)->get();
        }
        if($role_id == 3){
            
            $meeting_all_data = Meeting::all();

            $u_ids_arr = array();
         
            foreach($meeting_all_data as $meeting_all){
               
                $u_ids_data = explode(',', $meeting_all['to_user_id']);
                $from_user_data = $meeting_all['from_user_id'];

                if(in_array($user_id, $u_ids_data))
                {
                    array_push($u_ids_arr,$meeting_all);
                }
                if($user_id==$from_user_data)
                {
                    array_push($u_ids_arr,$meeting_all);
                }
            }
        
            foreach($u_ids_arr as $data){
                $ids[] = $data['id'];
            }
            $meeting_data = Meeting::whereIn('id',$ids)->get();
           
        }
        if($role_id == 4){
            $meeting_data = Meeting::where('from_user_id',$user_id)->get();
        }
        
        
        foreach($meeting_data as $meeting){

            $university_id = University::where('id',$meeting->university_id)->first();
            $meeting->uni_name= $university_id['uni_name'];

            $user = $meeting->to_user_id;
            $fromuser = $meeting->from_user_id;
            $from_user_data = User::where('id',$fromuser)->get();
           
            $from_user_data[0]->firstName;
            $meeting['amuni_name'] = $from_user_data[0]->firstName;
            
            $users = explode(",",$user);
           
            $user_data = User::whereIn('id',$users)->get();
            
            $user_data_array = array();
            foreach($user_data as $data){
               $user_name = $data['firstName'];
               array_push($user_data_array ,$user_name);
            }
          
            $users_name = implode(",",$user_data_array);
            $meeting->user_name= $users_name;
        }
       
        return view('admin.meetings.meetings_list', compact('meeting_data','permission_array','role_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo @$matched_alum_ids = base64_decode($_GET['id']);
        $agenda = Agenda::all();

        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];
        $user_id = $user['id'];
        $university_id = $user['university_id'];
        
        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        //$request->session()->put('permissions', $permission_array);
       Session::push('permissions', $permission_array);

        $univeristy = University::all();
        $students = User::where('role_id',3)->get();

        $logged_in_interest = UserInterestAreas::where('status', 1)->where('role_id', $role_id)->where('user_id', $user_id)->get();
       
        $loggedin_user_interest_data = array();
        foreach($logged_in_interest as $data){
            $interest_id = $data['interest_id'];
            array_push($loggedin_user_interest_data, $interest_id);
        }

        if($role_id == 3){
            $students = UserInterestAreas::join('users','users.id','=','user_interest_areas.user_id','left')->whereIn('interest_id', $loggedin_user_interest_data)->where('user_interest_areas.status',1)->where('users.university_id',$university_id)->where('user_interest_areas.role_id',4)->groupBy('user_interest_areas.user_id')->get();
        }
      
        if($role_id == 4){
            $students = UserInterestAreas::join('users','users.id','=','user_interest_areas.user_id','left')->whereIn('interest_id', $loggedin_user_interest_data)->where('user_interest_areas.status',1)->where('users.university_id',$university_id)->where('user_interest_areas.role_id',3)->groupBy('user_interest_areas.user_id')->get();
        }

       
        return view('admin.meetings.schedule_meeting',compact('univeristy','students','agenda','role_id','permission_array','matched_alum_ids'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());die;
        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];
        $request->validate(
            [
                'meeting_title' =>  'required|string|max:255',
                'timezone'      =>  'required',
                'start_date'    =>  'required',
                //'students' =>  'required|min:3',
                'start_time'    =>  'required',
               // 'end_date'      =>  'required',
                'end_time'      =>  'required',
                'meeting_url'   =>  'required', 
                'agenda'        =>  'required', 
            ], 
            [
                'meeting_title.required' => 'Meeting Title is required',
                'timezone.required'  => 'Timezone is required',
               // 'students.required'  => 'Students is required',
                //'students.min'  => 'Please Select Minimum 3 Values',
                'start_date.required'     => 'Start Date is required',
                'start_time.required'     => 'Start Time is required',
                //'end_date.required'  => 'End Date is required',
                'end_time.required'  => 'End Time is required',
                'meeting_url.required'  => 'Meeting URL is required',
                'agenda.required' => 'Agenda is required',
            ]
        );

        $start_date_time = $request->start_date." ".$request->start_time;
        $end_date_time = $request->start_date." ".$request->end_time;

        if($role_id == 4){
            $students = implode(",",$request->students);
        
       
        

            $user_datas[] = User::whereIn('id',$request->students)->get();


           
            // $email = $user_email['email']; return;
                    
            $dataArray  = Meeting::create([
       
                "meeting_title"  =>   $request->meeting_title,
                "meeting_description" =>   $request->meeting_description,
                "from_user_id" =>  Auth::user()->id,
                "to_user_id" => $students,
                "university_id" => Auth::user()->university_id,
                "timezone" => $request->timezone,
                "start_date_time" =>  $start_date_time,
                "end_date_time" =>  $end_date_time,
                "meeting_url" =>  $request->meeting_url,
                "agenda_id" =>  $request->agenda,
                "status" =>  1,    
            ]);
        
        //if($dataArray){
            


            foreach( $user_datas[0] as $datas){

                $data = array(
                    'meeting_title'=>$request->meeting_title,
                    'student_name' => $students,
                    'meeting_description' => $request->meeting_description,
                    'start_date' => $request->start_date,
                    'start_time' => $request->start_time,
                    'end_date' => $request->start_date,
                    'end_time' => $request->end_time,
                    'from_user_name' => Auth::user()->firstName,  
                    'to_user_names' => $datas['firstName']." ".$datas['lastName'],
                );
                
                $user_email = $datas['email'];
                $to_user_names = $datas['firstName']." ".$datas['lastName'];
                $meeting_title = $request->meeting_title;
                $meeting_description = $request->meeting_description;
                $start_date = $request->start_date;
                $start_time = $request->start_time;
                $end_date = $request->start_date;
                $end_time = $request->end_time;
                $from_user_name = Auth::user()->firstName;
              
                Mail::send('admin.mail.mail', $data, function($message) use($meeting_title,$meeting_description,$start_date,$start_time,$end_date,$end_time,$user_email,$from_user_name,$to_user_names) {
                    $message->to($user_email, 'Pathport')->subject
                      ('Meeting Scheduled');
                 
                });
            }
           
        }

        else{
            $students = $request->students;
        
       
        

            $user_datas = User::where('id',$request->students)->get();

            //echo "<pre>";print_r($user_datas[0]['firstName']);die;
            $dataArray  = Meeting::create([
       
                "meeting_title"  =>   $request->meeting_title,
                "meeting_description" =>   $request->meeting_description,
                "from_user_id" =>  Auth::user()->id,
                "to_user_id" => $students,
                "university_id" => Auth::user()->university_id,
                "timezone" => $request->timezone,
                "start_date_time" =>  $start_date_time,
                "end_date_time" =>  $end_date_time,
                "meeting_url" =>  $request->meeting_url,
                "agenda_id" =>  $request->agenda,
                "status" =>  1,    
            ]);

            //foreach( $user_datas[0] as $datas){

                $data = array(
                    'meeting_title'=>$request->meeting_title,
                    'student_name' => $students,
                    'meeting_description' => $request->meeting_description,
                    'start_date' => $request->start_date,
                    'start_time' => $request->start_time,
                    'end_date' => $request->start_date,
                    'end_time' => $request->end_time,
                    'from_user_name' => Auth::user()->firstName,  
                    'to_user_names' => $user_datas[0]['firstName']." ".$user_datas[0]['lastName'],
                );
                
                $user_email = $user_datas[0]['email'];
                $to_user_names = $user_datas[0]['firstName']." ".$user_datas[0]['lastName'];
                $meeting_title = $request->meeting_title;
                $meeting_description = $request->meeting_description;
                $start_date = $request->start_date;
                $start_time = $request->start_time;
                $end_date = $request->start_date;
                $end_time = $request->end_time;
                $from_user_name = Auth::user()->firstName;
              
                Mail::send('admin.mail.mail', $data, function($message) use($meeting_title,$meeting_description,$start_date,$start_time,$end_date,$end_time,$user_email,$from_user_name,$to_user_names) {
                    $message->to($user_email, 'Pathport')->subject('Meeting Scheduled');
                 
                });

                
            //}
        } 
      
       // }
        return redirect()->route('meeting.create')
                        ->with('success','Meeting Scheduled successfully.');
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
        $user = Auth::guard('web')->user();
        $university_id = $user['university_id'];
        $role_id = $user['role_id'];
        $user_id = $user['id'];
        $meeting_data = Meeting::find($id);
        $agenda = Agenda::all();
        $university = University::all();

        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        //$request->session()->put('permissions', $permission_array);
       Session::push('permissions', $permission_array);

        $user = $meeting_data['to_user_id'];
       
        $from_user_id = $meeting_data['from_user_id'];
       // @$alumini_data = User::select('firstName','lastName')->where('id',$from_user_id)->get();
        
        $users2 = explode(",",$user);
        $users1 = explode(" ",$from_user_id);
        $users = array_merge($users2,$users1);


        $users_datas = User::select('id')->where('role_id',4);
       
        

        $univeristy = University::all();
        $students = User::where('role_id',3)->get();

        $logged_in_interest = UserInterestAreas::where('status', 1)->where('role_id', $role_id)->where('user_id', $user_id)->get();
       
        $loggedin_user_interest_data = array();
        foreach($logged_in_interest as $data){
            $interest_id = $data['interest_id'];
            array_push($loggedin_user_interest_data, $interest_id);
        }

      if($role_id == 3){
        $students = UserInterestAreas::join('users','users.id','=','user_interest_areas.user_id','left')->whereIn('interest_id', $loggedin_user_interest_data)->where('user_interest_areas.status',1)->where('users.university_id',$university_id)->where('user_interest_areas.role_id',4)->groupBy('user_interest_areas.user_id')->get();
      }
      
      if($role_id == 4){
        $students = UserInterestAreas::join('users','users.id','=','user_interest_areas.user_id','left')->whereIn('interest_id', $loggedin_user_interest_data)->where('user_interest_areas.status',1)->where('users.university_id',$university_id)->where('user_interest_areas.role_id',3)->groupBy('user_interest_areas.user_id')->get();
      }

      // echo "<pre>";print_r($students);die;
        return view('admin.meetings.edit_meeting',compact('meeting_data','university','students','agenda','users','role_id','permission_array'));  
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

        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];

        if($role_id == 4){
            $request->validate(
                [
                  
                    'students' =>  'array|min:3',
                   
                ], 
                [
                    
                    'students.min'  => 'Please select Minimum 3 values ',
                    
                ]
            );
        }
        $start_date_time = $request->start_date." ".$request->start_time;
        $end_date_time = $request->start_date." ".$request->end_time;
        if($role_id == 3){
            $students = $request->students;
        }
        else{
            $students = implode(",",$request->students);
        }
        
        $data = array(
            "meeting_title"  =>   $request->meeting_title,
            "meeting_description" =>   $request->meeting_description,
            "from_user_id" =>  Auth::user()->id,
            "to_user_id" =>$students,
            "university_id" => Auth::user()->university_id,
            "agenda_id"=>$request->agenda,
            "timezone" =>  $request->timezone,
            "start_date_time" =>   $start_date_time,
            "end_date_time" =>  $end_date_time,
            "meeting_url" =>  $request->meeting_url,
           
    );
    
    $update = Meeting::where('id',$id)->update($data); 
    if($update){
       
        return redirect('meeting')->with("success","Success Meeting Edit");
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
        //
        $meetings = Meeting::find($id);
        if(!is_null($meetings)){
            $meetings->delete();
        }
        return redirect('meeting');
    }

    public function get_alumini_date(Request $request){
        $alum_id = $request->alum_id;
        $alum_dates_array = array();
        $alum_dates_data = AlumniAval::select('date')->where('user_id',$alum_id)->get();

        /*foreach($alum_dates_data as $alum_dates){
            $dates = date('m/d/Y',strtotime($alum_dates['date']));
            array_push($alum_dates_array,$dates);
        }*/
        echo json_encode($alum_dates_data);

    }
}
