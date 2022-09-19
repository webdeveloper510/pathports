<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\University;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $univeristy = University::all();
        return view('frontend.register',compact('univeristy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $request->validate(
            [
                'firstname'         =>  'required|string|max:255',
                'lastname'          =>  'required|string|max:255',    
                'username'       =>  'required|string',
                'email'             =>  'required|email|unique:users,email',
                'password'          =>  'required|min:6',
                'confirm_password' => 'required|min:6|same:password',
                'contact'           =>  'required|regex:/^([0-9\s\-\.\(\)]*)$/',
                'university_id'           =>  'required',
            ], 
            [
                'firstName.required' => 'First Name is required',
                'lastName.required'  => 'Last Name is required',
                'username.required'  => 'Username is required',
                'email.required'     => 'Email is required',
                'email.unique'     => 'The email has already been taken',
                'password.required'  => 'Password is required',
                'confirm_password.required' => 'Confirm Password is required',
                'contact.required'    => 'Contact Number is required',
                'contact.regex' => 'The Contact Number must be 10 digits.',
                'university_id.required' => 'University Name is required',
            ]
        );

        $imageName='';
        if($request->has('graudate_resume')){
            @$imageName = time().'.'.$request->graudate_resume->extension();  

            $request->graudate_resume->move(public_path('assets/admin/images/alumini/'), $imageName);
        }

        $dataArray  = User::create([
       
            "firstName"  =>   $request->firstname,
            "lastName" =>   $request->lastname,
            "email" =>  $request->email,
            "username" =>$request->username,
            "role_id" => $request->tab_id,
            "password"=> Hash::make($request->password),
            "alternative_email" =>  $request->alternat_email,
            "contact" =>  $request->contact,
            "university_id" =>  $request->university_id,
            "graduate_resume"  =>  $imageName ? $imageName:"",
        ]);

        
        return redirect()->route('register.index')
                        ->with('success','Registered Successfully.');
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
}
