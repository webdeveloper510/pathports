<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\University;
use App\Models\User;
use App\Models\Assign_permission;
use App\Models\Permissions;
use Session;




class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $university = University::all();
        $user = Auth::guard('web')->user();
        $uni_id = $user['university_id'];
        $role_id = $user['role_id'];

        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();
      
   
      
        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        
        $request->session()->put('permissions', $permission_array);

        //Session::push('permissions', $permission_array);
     
        if($role_id==1){
           // $university = University::join('users', 'users.university_id', '=', 'universities.id','left')->get(['universities.*','users.firstname','users.lastname','users.id as users_id']);
          
            $university = University::all();
        }
        else{
            $university = University::join('users', 'users.university_id', '=', 'universities.id','left')->where('role_id',2)->where('university_id',$uni_id)->groupBy('universities.id')->get(['universities.*','users.firstname','users.lastname','users.id as users_id']);
        }

        

        $data = compact('university','permission_array');
        return view('admin.university.university_list')->with($data);

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $user = Auth::guard('web')->user();
        $uni_id = $user['university_id'];
        $role_id = $user['role_id'];

        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();
      
   
      
        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        
        //$request->session()->put('permissions', $permission_array);

        Session::push('permissions', $permission_array);
        return view('admin.university.adduniversity',compact('permission_array'));  
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
                'uni_name'              =>      'required|unique:universities,uni_name',
                'uni_slug'              =>      'required',
                'uni_email'             =>      'required|email|unique:users,email',
                'uni_desc'              =>      'required|string',
                'uni_address'           =>      'required|string',
                'uni_contact'               =>      'required|regex:/^([0-9\s\-\.\(\)]*)$/',
                'uni_alternate_contact' =>      'required|regex:/^([0-9\s\-\.\(\)]*)$/',
                'uni_image' => 'mimes:png|max:10000',
            ], 
            [
                'uni_name.required' => 'University Name is required',
                'uni_slug.required' => 'University Slug Name is required',
                'uni_email.required' => 'Email is required',
                'uni_email.unique' => 'The email has already been taken',
                'uni_desc.required' => 'Description is required',
                'uni_address.required' => 'Address is required',
                'uni_contact.required' => 'Contact Number is required',
                'uni_alternate_contact.required' => 'Alternate Contact is required',
                'uni_contact.regex' => 'The Contact Number must be 10 digits.',
                'uni_alternate_contact.regex' => 'The Alternate Contact Number must be 10 digits.',
                'uni_image.mimes' => 'Logo must be png format',
            ]
        );
      
        $imageName ='';
        if($request->has('uni_image')){
            @$imageName = time().'.'.$request->uni_image->extension();  

            $request->uni_image->move(public_path('assets/admin/images/university/logo/'), $imageName);

        }
        

        //$name = $request->file('uni_image')->getClientOriginalName();
 
        //$path = $request->file('uni_image')->store('public/assets/admin/images');
        
        $dataArray  = University::create([
       
            "uni_name"  =>   $request->uni_name,
            "uni_slug"  =>   Str::slug($request->uni_slug),
            "uni_email" =>   $request->uni_email,
            "uni_desc"   =>  $request->uni_desc,
            "uni_address" =>  $request->uni_address,
            "uni_contact" =>  $request->uni_contact,
            "uni_alternate_contact" =>  $request->uni_alternate_contact,        
            "uni_image"           =>  $imageName ? $imageName:"",
        ]);

        
        return redirect()->route('universities.create')
                        ->with('success','University Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $university = University::all();
        $university = University::find($id);

        // return response()->json([
        //     'status' => 200,
        //     'university' => $university,
        // ]);
        return view('admin.university.edit_university',compact('university','permission_array'));  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
       
        $request->validate(
            [
                'uni_email'             =>      'email|unique:users,email',
                'uni_contact'               =>  'required|regex:/^([0-9\s\-\.\(\)]*)$/',
                'uni_alternate_contact' =>      'regex:/^([0-9\s\-\.\(\)]*)$/',
            ],
            [ 
                'uni_email.unique'=>'The email has already been taken.',
                'uni_contact.required' => 'The Contact Number is required.',
                'uni_contact.regex' => 'The Contact Number must be 10 digits.',
                'uni_alternate_contact.regex' => 'The Alternate Contact Number must be 10 digits.',
            ]
        );

        $imageName =  $request->file('uni_image');
        
        if($request->file('uni_image')){
            
            @$imageName = time().'.'.$request->uni_image->extension();  

            $request->uni_image->move(public_path('assets/admin/images/university/logo/'), $imageName);
            $data = array(
                "uni_name"      => $request->uni_name,
                "uni_slug"  =>   Str::slug($request->uni_slug),
                "uni_email"     => $request->uni_email,
                "uni_desc"      => $request->uni_desc,
                "uni_address"   => $request->uni_address,
                "uni_contact"   => $request->uni_contact,
                "uni_alternate_contact"   => $request->uni_alternate_contact,
                "uni_image"  => $imageName,
            );

            $update = University::where('id',$id)->update($data); 
            if($update){
                return redirect('universities')->with("success","Success univeristy Edit");
            }
            
        }
        else{

            $data = array(
                "uni_name"      => $request->uni_name,
                "uni_slug"  =>   Str::slug($request->uni_slug),
                "uni_email"     => $request->uni_email,
                "uni_desc"      => $request->uni_desc,
                "uni_address"   => $request->uni_address,
                "uni_contact"   => $request->uni_contact,
                "uni_alternate_contact"   => $request->uni_alternate_contact,
                
            );
            $update = University::where('id',$id)->update($data); 
            if($update){
                return redirect('universities')->with("success","Success univeristy Edit");
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
        $university = University::find($id);
        if(!is_null($university)){
            $university->delete();
        }
        return redirect('universities');
        //return redirect()->route('admin.university.index');
    }

}

