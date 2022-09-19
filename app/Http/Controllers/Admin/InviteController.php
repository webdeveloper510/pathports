<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use App\Models\University;
use App\Models\Permissions;
use App\Models\Surveys;
use App\Models\Survey_Manages;
use App\Models\Assign_permission;
use Mail;
use Session;


class InviteController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)

    {

        $survey_list = Survey_Manages::all();
        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];
        $roles = Role::where('id', '!=', 1)->get();
       

        $university = University::all();
        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        //$request->session()->put('permissions', $permission_array);
        Session::push('permissions', $permission_array);
        return view('admin.invite.send_invite',compact('roles','permission_array','survey_list'));
    }

   public function create(Request $request){
 
    $request->validate(
            [
                'role'         =>  'required',
                'subject'         =>  'required',
                'message'         =>  'required',
                
            ], 
            [
                'role.required' => 'Role is required',
                'message.required' => 'Message is required',
               
                'subject.required' => 'Subject is required',
                
            ]
        );
        $survey_list = base64_encode($request->hidden_ques);
        
         $user_id = $request->user;
         $users = User::select('id','firstName','lastName','email','university_id')->whereIn('id',$user_id)->get();
          
         // $users = User::select('id','firstName','lastName','email','university_id')->where('role_id',$role_id )->get();
         // echo"<pre>";
         // print_r($users);die;
        
         
         $subject = $request->subject;
         $message = $request->message;
         $cat_title = $request->survey_category;
         $survey_category = base64_encode($request->survey_category);
        
        
         $html = "<p>Share your review here</p>";
         $html1 = "<a href='http://wellspringinfotech.com/pathports/feedback/&surv_cat=".$survey_category."&surv=".$survey_list."'>link</a>";
      
         
       
      
         $data = $request->message.' '.$html.' '.$html1;
 
        foreach($users as $users_data){
        
            $email = $users_data->email;
            $firstName = $users_data->firstName;
            $lastName = $users_data->lastName;
            $all_user_id = base64_encode($users_data->id);

            $data = array(
                    "email" => $users_data->email,
                    "firstName" => $users_data->firstName,
                    "lastName" => $users_data->lastName,
                   //"survey_category" => base64_encode($survey_category),
                    "messages" => $request->message,
                    "userid" => $users_data->id,
                   
                );
       
                $name = $users_data->firstName." ".$users_data->lastName;
                 $userid = $users_data->id;
               
                $cust_message = $request->message;

                if($cat_title){
                    $messages = '<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation"
                    style="width:600px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align: left;">
                    <tr style="border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;">
                        <td style="padding: 10px 25px;background: #fff;text-align: left;">
                             <span style="font-weight: bold; padding-top: 10px;font-size: 18px;">Survey Invitation </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:36px 30px 42px 30px;">
                            <table role="presentation"
                                style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 36px 0;color:#153643;">
                                        <p style="font-weight:bold;margin:0 0 20px 0;font-family:Arial,sans-serif;">
                                            Hello '.$name.',</h1>
                                            
                                        <p
                                            style="margin:0 0 12px 0;font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
                                            Would you like to fill up a short survey to help us improve our services? it will take only 2 minutes!
                                            </p>
                                        
                                        
                                        <p style="text-align: center;margin: 28px 0 !important;">
                                            <a href="http://wellspringinfotech.com/pathports/feedback/?surv_cat='.$survey_category.'&surv='.$survey_list.'&user_id='.$all_user_id.'" class="btn">Survey Link</a>
                                        </p>
                                         
                                         <p
                                            style="margin:10px 0 12px 0;font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
                                         Thank you in advance for your valuable insights. Your input will be used to ensure that we continue to meet your needs.
                                        </p>

                                         <p
                                            style="margin:10px 0 12px 0;font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
                                       We appreciate your trust in us and look and look forward to savings you in future. For any questions, contact our <span style="color:#38c9ff;">admin@pathports.com</span>
                                        </p>

                                        <p style="margin:0px 0 12px 0 !important;padding-top: 15px;font-size:14px !important;font-family:Arial,sans-serif;">
                                            Thank
                                            you, </p>
                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>';
                }
                else{
                    $messages = '<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation"
                    style="width:600px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align: left;">
                    <tr style="border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;">
                        <td style="padding: 10px 25px;background: #fff;text-align: left;">
                             <span style="font-weight: bold; padding-top: 10px;font-size: 18px;">Survey Invitation </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:36px 30px 42px 30px;">
                            <table role="presentation"
                                style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 36px 0;color:#153643;">
                                        <p style="font-weight:bold;margin:0 0 20px 0;font-family:Arial,sans-serif;">
                                            Hello '.$name.',</h1>
                                            
                                        <p
                                            style="margin:0 0 12px 0;font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
                                            Would you like to fill up a short survey to help us improve our services? it will take only 2 minutes!
                                            </p>
                                        
                                        
                                       
                                         
                                         <p
                                            style="margin:10px 0 12px 0;font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
                                         Thank you in advance for your valuable insights. Your input will be used to ensure that we continue to meet your needs.
                                        </p>

                                         <p
                                            style="margin:10px 0 12px 0;font-size:14px;line-height:24px;font-family:Arial,sans-serif;">
                                       We appreciate your trust in us and look and look forward to savings you in future. For any questions, contact our <span style="color:#38c9ff;">admin@pathports.com</span>
                                        </p>

                                        <p style="margin:0px 0 12px 0 !important;padding-top: 15px;font-size:14px !important;font-family:Arial,sans-serif;">
                                            Thank
                                            you, </p>
                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>';
                }
                

               
             
            Mail::send( [], $data ,function($message) use($email,$subject,$firstName,$lastName,$survey_category,$survey_list,$messages){
                $message->to($email,'Pathports');
                $message->subject($subject);
                $message->setBody($messages, 'text/html');
            });
        }
        return redirect()->back()->with("success","Invite Sent Successfully");
    }

    public function feedback(){
        $surv_cat = base64_decode($_GET['surv_cat']);
        $selected_ques = base64_decode($_GET['surv']);
        $user_id = base64_decode($_GET['user_id']);
        
        $selected_ques_list = explode(",",$selected_ques);
        $ques_list = Survey_Manages::where('title',$surv_cat)->whereIn('id',$selected_ques_list)->get();
        return view('admin.invite.feedback',compact('ques_list','user_id'));
    }

    public function survey_manage(){

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

        return view('admin.survey.survey_manage',compact('permission_array'));
    }

    public function get_survey_data(Request $request){
      $title_id = $request->title;
      $survey_list = Survey_Manages::where('title',$title_id)->get();
      return response()->json($survey_list);
    }

    public function get_user_data(Request $request){
      $users_id = $request->user_role;
      $user_list = User::where('role_id',$users_id)->get();
      return response()->json($user_list);
    } 

    public function surveycreate(Request $request){
       
      //$id = base64_decode($request->user_id);
     
      $answer = $request->answer;
     
     
      foreach($answer as $value){

                $survey = new Surveys();
                $survey->user_id =  $request->user_id;
                $survey->firstname =  $request->firstname;
                $survey->lastname =  $request->lastname;
                $survey->comment =  $request->comment;
                $survey->rating = $request->rating;
                $survey->answer = $value;
                
                
      
      // $dataArray  = Surveys::create([
       
      //           "user_id"    =>   $request->user_id,
      //           "firstname"  =>   $request->firstname,
      //           "lastname"   =>   $request->lastname,
      //           "lastname"   =>   $request->lastname,
      //           "comment"    =>   $request->comment,
      //           "rating"     =>   $request->rating,
      //           "answer"     =>   $value,
                
      //       ]);
        if($survey->save()){

            return redirect()->back()->with("success", "Survey Submitted Successfully");
        }
     }
    }
    
}
