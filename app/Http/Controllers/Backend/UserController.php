<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\University;
use App\Models\User;





class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
      $users = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')->where('role_id',2)->get(['users.*', 'roles.name']);
        
        $data = compact('users');
        return view('backend.university.users.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $university = University::all();
        $data = compact('university');
        return view('backend.university.users.addusers')->with($data);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->firstName);

        $request->validate(
            [
                'firstName'  => 'required|string|max:255',
                'lastName'   =>  'required|string|max:255',    
                'username'  =>  'required|string',
                'email'   =>  'required|email|unique:users,email',
                'password' => 'required|confirmed|min:6',
                'university_id' => 'required',
                
                //'uni_image' => 'mimes:jpg,jpeg,png,pdf|max:10000'
            ], 
            [
                'firstName.required' => 'First Name is required',
                'lastName.required' => 'Last Name is required',
                'username.required' => 'Username is required',
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
                'university_id.required' => 'University Name is required',
            ]
        );
      
        
        //$imageName = time().'.'.$request->uni_image->extension();  

        //$request->uni_image->move(public_path('assets/backend/images'), $imageName);

        $dataArray  = User::create([
       
            "firstName"  =>   $request->firstName,
            "lastName" =>   $request->lastName,
            "username"   =>  $request->username,
            "email" =>  $request->email,
            "password" =>  Hash::make($request->password),
            "role_id" =>  2,    
            "university_id" =>  $request->university_id,    
            "status" =>  1,    
            "is_online" =>  1,    
            //"uni_image"           =>  $imageName,
        ]);

        
        return redirect()->route('backend.users.create')
                        ->with('success','Administrator Added successfully.');


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
        $university = University::all();

        return view('backend.university.users.editusers',compact('users','university'));  
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
       // echo $university_id; die;
        $data = array(
                        "firstName"      => $request->firstName,
                        "lastName"     => $request->lastName,
                        "username"      => $request->username,
                        "email"   => $request->email,
                        "password"   => Hash::make($request->password),
                        "university_id"   => $request->university_id,
                    );
        $update = User::where('id',$id)->update($data); 
        if($update){
            return redirect('backend/users')->with("success","Success Users Edit");
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
        return redirect('backend/users');
        
    }

}
