<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\University;
use App\Models\User;
use App\Models\Assign_permission;
use App\Models\Permissions;
use Mail;
use Hash;
class AuthController extends Controller
{
    
    public function index(Request $request,$id=null)
    {
        $u_id = base64_decode($id);

        $university_data =  University::where('id', $u_id)->get();
        $request->session()->put('university_data',$university_data);

        if(Auth::check()){
            return redirect()->intended(route('dashboard'));
        }
        else{
            return view('admin.auth.login',compact('id','university_data','u_id'));
        }
     
        
    }
        /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    /*public function view(){
        return view('admin.auth.login');
    }*/
   
    public function login(Request $request,$id=null)
    {
    
        $this->validate($request, [
            'email'   => 'required|email|exists:users',
            'password' => 'required|min:6'
        ]);
             
        if (Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get('remember'))) {

            $role_id = Auth::user()->role_id;

            /*** For permission ***/
            $all_permissions = Permissions::all();
            $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();
      
            $permission_array= array();
            foreach($assign_permission as $per){
                array_push($permission_array,$per->permission_id);
            }
            $request->session()->put('permissions', $permission_array);

            if($role_id ==1){

                //$id = base64_decode($id);
                if($id){
                    return redirect()->route('login',$id)->with('error','Invalid Login Details');
                }
                else{
                    $request->session()->put('uni_session_id',$id);
                    return redirect()->intended(route('dashboard'));
                }
            } else{
                             
                $id = base64_decode($id);

                $authid= Auth::user()->university_id;
                                
                if($id == $authid ){
                    $request->session()->put('uni_session_id',$id);
                    return redirect()->intended(route('dashboard'));
            
                }else{
               
                    $id = base64_encode($id);
                    
                    //return view('admin.auth.login',compact('id')); //Commented By A

                    return redirect()->route('login',$id)->with('error','Invalid Login Details');
                }
            }
        }
           
        return back()->withInput($request->only('email', 'remember'))->withErrors(['password' => 'Please check your password.']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
        
    public function forgotpassword(){
        return view('admin.forgot_password');
    }

    public function submitForgetPassword(Request $request){
            
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
       

        $user = User::where('email' ,$request->email)->get(); 
        $data = array( 
                "id"         =>  base64_encode($user[0]->id),
                "email"      =>  $user[0]->email,
                "firstName"  =>  $user[0]->firstName,
                "lastName"   =>  $user[0]->lastName,
            );

            $id  = base64_encode($user[0]->id);
            $email        = $user[0]->email;
            $firstName    = $user[0]->firstName;
            $lastName     = $user[0]->lastName;

        Mail::send('admin.mail.forget_email', $data, function($message) use($email, $firstName,$lastName,$id ) {
            $message->to($email, 'Pathport')->subject
            ('Forgot Password');

        });
        return redirect()->back()->with('success','Reset password link sent to your email.');
    }

    public function changepassword($id){
        $id  = base64_decode($id);
        return view('admin.change_password',compact('id'));
    }
    public function submitchangepassword(Request $request,$id){
     
        $request->validate([
            
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = User::where('id', $id)->update(['password' => Hash::make($request->password)]);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
