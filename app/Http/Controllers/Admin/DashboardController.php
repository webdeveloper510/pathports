<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\University;
use App\Models\User;
use App\Models\Surveys;
use App\Models\Assign_permission;
use App\Models\Permissions;
use App\Models\Meeting;
use App\Models\UserInterestAreas;
use App\Models\InterestAreas;
use RealRashid\SweetAlert\Facades\Alert;
use Redirect;
use Session;
use Mail;
class DashboardController extends Controller
{
    
    public function index(Request $request)
    {
  
        //return view('admin.dashboard');
                
        $user              = Auth::user();
        $role_id           = $user['role_id'];
        $u_id              = Auth::user()->university_id;
        $university_id     = $user['university_id'];
        $encode            = base64_encode($u_id);
        $sessionUID        = session()->get('uni_session_id');
        $user_id           =  Auth::user()->id;
        $all_permissions   = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();
        $permission_array  = array();

        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        
        $request->session()->put('permissions', $permission_array);

        $university_data   =  University::where('id', $u_id)->get();
       
        $request->session()->put('university_data',$university_data);
        
        /*if($sessionUID!=null){
            $id = base64_decode(session()->get('uni_session_id'));
            if($u_id==$id){
                
                $university = University::all();
                $university_count = $university->count();
                $graduates = User::where('role_id',3)->where('university_id',$u_id)->get();
                $graduates_count = $graduates->count();
                $alumini = User::where('role_id',4)->where('university_id',$u_id)->get();
                $alumini_count = $alumini->count();
                return view('admin.dashboard',compact('university_count','graduates_count','alumini_count'));
            }
            else{
                return redirect()->route('logout');
            }
        }
        else{*/
            
            if($u_id){
                $university       = University::where('id',$u_id)->get();
                $university_count = $university->count();

                $graduates        = User::where('role_id',3)->where('university_id',$u_id)->get();
                $graduates_count  = $graduates->count();

                $alumini          = User::where('role_id',4)->where('university_id',$u_id)->get();
                $alumini_count    = $alumini->count();

                $booster          = User::where('role_id',5)->where('university_id',$u_id)->get();
                $booster_count    = $booster->count();
            }
            else{
                $university       = University::all();
                $university_count = $university->count();

                $graduates        = User::where('role_id',3)->get();
                $graduates_count  = $graduates->count();

                $alumini          = User::where('role_id',4)->get();
                $alumini_count    = $alumini->count();

                $booster          = User::where('role_id',5)->get();
                $booster_count    = $booster->count();
            }
                        
            $meeting             = Meeting::where('from_user_id',$user_id)->get();
            $meeting_count_alum  = $meeting->count();

            //$to_user_ids = Meeting::select('to_user_id','id')->where('to_user_id','!=',$user_id)->orderBy('id', 'DESC')->first();

            $to_user_ids = Meeting::join('users','users.id','=','meetings.to_user_id','left')
                                    ->select('meetings.to_user_id','meetings.id','users.role_id')
                                    ->where('meetings.to_user_id','!=',$user_id)
                                    ->where('users.role_id','=', 3)
                                    ->orderBy('meetings.id', 'DESC')
                                    ->first();
           
            $meeting_id         =  $to_user_ids->id;
            $explode_user_ids   =  explode(",",$to_user_ids['to_user_id']);
            $graduates_user_data = User::whereIn('id',$explode_user_ids)->get();


            $user_data_array  = array();

            foreach($graduates_user_data as $data){

               $user_name     = $data['firstName']." ".$data['lastName'];
               array_push($user_data_array ,$user_name);
            }
          
            $users_name          = implode(",",$user_data_array);
            $meeting->user_name  = $users_name;
           

            $uni_datas     = University::join('meetings','meetings.university_id','=','universities.id','left')
                                        ->groupBy('meetings.university_id')
                                        ->get();

            $uni_name_array  = array();
            $values_array    = array();

            foreach($uni_datas as $datas){

                $uni_name      = $datas['uni_name'];
                $uni_id        = $datas['university_id'];

                array_push($uni_name_array,$uni_name);
                array_push($uni_name_array,$uni_id);

                $meeting_count = Meeting::where('university_id',$uni_id)->get();
                $meeting_count = $meeting_count->count();

                array_push($values_array,$meeting_count);
            }

          // Agenda Chart  start
            
        if($role_id == 1){
                $agenda_datas     = Meeting::join('agenda','agenda.id','=','meetings.agenda_id','left')
                                        ->groupBy('meetings.agenda_id')
                                        ->get();

                $agenda_name_array  = array(); 
                $agenda_value       = array();  

            foreach($agenda_datas as $agendas){

                $agenda_name      = $agendas['name'];

                $agenda_id        = $agendas['agenda_id'];
                array_push($agenda_name_array,$agenda_name);
    
                $agenda_count = Meeting::where('agenda_id',$agenda_id)->get();
                $agenda_count = $agenda_count->count();

                array_push($agenda_value,$agenda_count);
            }   
        } 
        if($role_id == 3){

            $agenda_datas     = Meeting::join('agenda','agenda.id','=','meetings.agenda_id','left')
                                        ->select('meetings.from_user_id','meetings.agenda_id','meetings.id','agenda.name')
                                        ->where('meetings.from_user_id',auth::user()->id)
                                        ->groupBy('meetings.agenda_id')
                                        ->get();

                    $agenda_name_array  = array(); 
                    $agenda_value       = array();  
                        
                foreach($agenda_datas as $agendas){
    
                    $agenda_name      = $agendas['name'];
    
                    $agenda_id        = $agendas['agenda_id'];
                    array_push($agenda_name_array,$agenda_name);
        
                    $agenda_count = Meeting::where('agenda_id',$agenda_id)->get();
                    $agenda_count = $agenda_count->count();
    
                    array_push($agenda_value,$agenda_count);
                }   
           

        }
          // Agenda Chart end


          /********* meeting Chart start *********/ 
          if($role_id == 3 ){

            $meeting_data   = Meeting::join('users','users.id','=','meetings.from_user_id','left')
                                        ->select('meetings.from_user_id','meetings.start_date_time')
                                        ->where('meetings.from_user_id',auth::user()->id)
                                        ->groupBy('meetings.start_date_time')
                                        ->where('users.role_id','=', 3)
                                        ->get();
                                       
                                      

            
            // $meeting_date = array();
            
            foreach($meeting_data as $values){
               
                $user_id       = $values->from_user_id;
                $start_date    = $values->start_date_time;
              
                $meet_date       = Meeting::where("from_user_id",$user_id)
                                            ->where("start_date_time",$start_date)
                                            ->groupBy('start_date_time')
                                            ->get();
                                          
                foreach($meet_date as $date){

                $set_date = date_create($date->start_date_time);
                $date_format =  date_format($set_date,"Y-m-d ");
                $values['x'] = $date_format;

                // array_push($meeting_date,$date_format);

                }
                $user     = Meeting::where("from_user_id",$user_id)
                                   ->where("start_date_time",$start_date)
                                   ->get();
                $c_count  = $user->count();
                $values['y'] = $c_count;
                //  array_push($meetingCount,$c_count);                              
            }
       $meeting_chart_value = json_encode($meeting_data);
        }

        if($role_id == 1){


            $meeting_data   = Meeting::groupBy('start_date_time')
                                        ->select('start_date_time')
                                        ->get();

            foreach($meeting_data as $value){
                $starting_date    = $value->start_date_time;
              
                $meetDate       = Meeting::where("start_date_time",$starting_date)
                                            ->groupBy('start_date_time')
                                            ->get();
                                            

                foreach($meetDate as $date){
                    $seting_date = date_create($date->start_date_time);
                    $date_form =  date_format($seting_date,"Y-m-d ");
                    $value['x'] = $date_form;    
                    // array_push($meeting_date,$date_format);    
                }
                $users     = Meeting::where("start_date_time",$starting_date)->get();
                $count  = $users->count();
                $value['y'] = $count;
            }
            $meeting_chart_value = json_encode($meeting_data);
        }
            
                  
            /****** Meeting chart End ******/


            /***Get matched Alumni in Student View****/
            $matched_alumni = "";

            if($role_id == 3){

                $loggedIn_user_id   =  Auth::user()->id;
                $logged_in_interest = UserInterestAreas::where('status', 1)
                                                    ->where('role_id', $role_id)
                                                    ->where('user_id', $loggedIn_user_id)
                                                    ->get();
                
                $loggedin_user_interest_data = array();

                foreach($logged_in_interest as $data){

                    $interest_id = $data['interest_id'];
                    array_push($loggedin_user_interest_data, $interest_id);
                }
                
                $matched_alumni   = UserInterestAreas::join('users','users.id','=','user_interest_areas.user_id','left')
                                                        ->whereIn('interest_id', $loggedin_user_interest_data)
                                                        ->where('user_interest_areas.status',1)
                                                        ->where('users.university_id',$university_id)
                                                        ->where('user_interest_areas.role_id',4)
                                                        ->groupBy('user_interest_areas.user_id')
                                                        ->limit(3)
                                                        ->get();
            }

            //$count_interest_id = UserInterestAreas::select('interest_id')->groupBy('interest_id')->get();
            $count_interest_id_data = UserInterestAreas::join('interest_areas','interest_areas.id','=','user_interest_areas.interest_id','left')
                                ->select('user_interest_areas.interest_id','interest_areas.interest_area_name')->groupBy('interest_id')->get();

            $slicing=[];

            foreach($count_interest_id_data as $count_interest_ids){

                $interest_ids = $count_interest_ids['interest_id'];

                $interest_area_name = $count_interest_ids['interest_area_name'];

                $count_interest_id = UserInterestAreas::select('interest_id')
                                                        ->where('interest_id',$interest_ids)
                                                        ->orderBy('interest_id')
                                                        ->count();

                $count_interest_ids['interest_area_name'] = $interest_area_name;

                $count_interest_ids['count'] = $count_interest_id;  
                
                $sliced = array(
                    'interest_area_name'=> $interest_area_name,
                    'count'=> $count_interest_id
                );
                array_push($slicing,$sliced);
            }
            
            /******* Get Top 5 InterestAreas*****/
            usort($slicing, function ($a, $b) { return $b['count'] - $a['count']; });
            $top5 = array_slice($slicing, 0, 5);
            //echo "<pre>";print_r($top5);

            /******* Get lowest 5 InterestAreas*****/
            usort($slicing, function ($previous, $next) { return $previous["count"] > $next["count"] ? 1 : -1; });
            $low5 = array_slice($slicing, 0, 5);

            //echo "<pre>";print_r($low5);
            
            
            //die;
            return view('admin.dashboard',compact('university_count','graduates_count','alumini_count',
                                                  'booster_count','meeting_count_alum', 'encode','permission_array',
                                                  'users_name','meeting_id','uni_name_array','values_array',
                                                  'matched_alumni','meeting_chart_value','agenda_name_array','agenda_value','top5','low5'));
            
        //}
        /*if(Auth::check()){
            return redirect()->intended(route('dashboard'));
        }
        else{
            return redirect()->intended(route('auth.login'));
        }*/
    }

    public function send_email(){
     
        $user = User::where('role_id','!=', 1)->get();
                  
        foreach($user as $value){

            $data = array(
                    "email"      => $value->email,
                    "firstName"  => $value->firstName,
                    "lastName"   => $value->lastName,
                    "id"         => base64_encode($value->id),
                   
                );                       
                $email       = $value->email;
                $id          = base64_encode($value->id);
                $firstName   = $value->firstName;
                $lastName    = $value->lastName;
                         
        Mail::send('admin.mail.survey_email', $data, function($message) use($email){
                   $message->to($email,'Pathport')
                           ->subject('Survey');
               
        });
        // return Response::json(['message' => 'sucess'], 200);       
    }

}

    public function survey($id){

        return view("admin.survey",compact('id')); 
    }

    public function surveycreate(Request $request){
       
      $id        = base64_decode($request->user_id);
      $user_data = User::where('id',$id)->get('role_id');
      
      $dataArray  = Surveys::create([
       
                "user_id"    =>   $id,
                "role_id"    =>   $user_data[0]->role_id,
                "firstname"  =>   $request->firstname,
                "lastname"   =>   $request->lastname,
                "lastname"   =>   $request->lastname,
                "comment"    =>   $request->comment,
                "rating"     =>   $request->rating,
                
            ]);
        if( $dataArray){

        return redirect()->back()->with("success", "Survey Submitted Successfully");
      }
     
    }
}
