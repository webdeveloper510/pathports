<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Permissions;
use App\Models\Role;
use App\Models\Assign_permission;
use Session;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];

        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();
        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        
        Session::put('permissions', $permission_array);
    
        $roles = Role::where('id', '!=', 1)->get();
        $permission = Permissions::all();
       
        if($role_id==1){
            return view('admin.permissions',compact('roles','permission','permission_array'));
         }
         else{
            return view('admin.restrict',compact('permission_array'));
         }
        
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
    public function view(Request $request){

        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];

        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();
      
        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        
        $request->session()->put('permissions', $permission_array);


        $permission = Permissions::all();
     
        $roles= $request->input( 'role' );
     
     //  $university = Assign_permission::join('permissions', 'permissions.id', '=',        'assign_permissions.permission_id','left')->where('assign_permissions.role_id',$roles)->get('permissions.name,permissions.description','assign_permissions.*');
       
       $selected_permission = Assign_permission::join('permissions', 'assign_permissions.permission_id', '=',        'permissions.id')->where('assign_permissions.role_id',$roles)->get(['assign_permissions.*','permissions.name','permissions.description']);
        echo json_encode($selected_permission);
  
    }
    public function permissionStore(Request $request){

        $user = Auth::guard('web')->user();
        $role_id = $user['role_id'];

        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();
        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        
        $request->session()->put('permissions', $permission_array);
     
        $roles= $request->input('role');
        $permissionArray= $request->input( 'permissionArray' );
        $all_permissions = Assign_permission::where(['role_id' => $roles])->get();
		
	
		if(!empty($all_permissions)){
		
    		foreach($all_permissions as $permission){
    			
    		    $permission_id = $permission->id;
                if(in_array($permission_id,$permissionArray)){
    			    $status = 1;
    	        }
    		    else {
    			    $status = 0;
                }			 
    		
    			$update_data = Assign_permission::where('id', $permission_id)->where('role_id', $roles)->update(["status" => $status]);
    			//echo json_encode($response);
    		}

	    }
        return redirect()->back()->with('success','Permission Saved successfully.');
    }
    public function store(Request $request)
    {
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
