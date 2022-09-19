<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterestAreasCategory;
use App\Models\Assign_permission;
use App\Models\Permissions;
use Auth;
use Session;

class InterestAreasCategoryController extends Controller
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
        
            $all_permissions = Permissions::all();
            $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

            $permission_array= array();
            foreach($assign_permission as $per){
                array_push($permission_array,$per->permission_id);
            }
            Session::push('permissions', $permission_array);

            $data = InterestAreasCategory::all();
        if($role_id==1){
            return view('admin.interestAreas.category.list',compact('data','permission_array'));
        }
        else{
            return view('admin.restrict',compact('data','permission_array'));
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::guard('web')->user();
        $user_id = $user['id'];
        $role_id = $user['role_id'];
      

        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        Session::push('permissions', $permission_array);
        if($role_id==1){
            return view('admin.interestAreas.category.add_category',compact('permission_array'));
        }
        else{
            return view('admin.restrict',compact('data','permission_array'));
        }
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
                'category_name'         =>  'required|string|max:255',
            ], 
            [
                'category_name.required' => 'Category is required',
            ]
        );

        $dataArray  = InterestAreasCategory::create([
            "category_name"  =>   $request->category_name,
        ]);
        
        return redirect()->route('interestCategories.create')
                        ->with('success','Category Added successfully.');
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
        $user_id = $user['id'];
        $role_id = $user['role_id'];
      

        $all_permissions = Permissions::all();
        $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

        $permission_array= array();
        foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
        }
        Session::push('permissions', $permission_array);
        $category_data = InterestAreasCategory::find($id);

        if($role_id==1){
            return view('admin.interestAreas.category.edit_category',compact('category_data','permission_array')); 
        }
        else{
            return view('admin.restrict',compact('data','permission_array'));
        }
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
                'category_name'           =>  'required',
            ], 
            [
                'category_name'            => 'Category Name Number is required',
            ]
        );
      
        $data = array(
            "category_name"  =>   $request->category_name,
        );

        $update = InterestAreasCategory::where('id',$id)->update($data); 
        if($update){
            return redirect('interestCategories')->with("success","Category Updated Successfully");
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
        $cat = InterestAreasCategory::find($id);
        if(!is_null($cat)){
            $cat->delete();
        }
        return redirect()->route('interestCategories.index')
                        ->with("success","Category Deleted Successfully");
   
    }
}
