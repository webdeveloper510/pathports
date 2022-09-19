<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterestAreasCategory;
use App\Models\InterestAreasSubCategory;
use App\Models\Assign_permission;
use App\Models\Permissions;
use Auth;
use Session;


class InterestAreasSubCategoryController extends Controller
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

        $data = InterestAreasSubCategory::join('interest_areas_categories', 'interest_areas_categories.id', '=', 'interest_areas_sub_categories.cat_id')
            ->get(['interest_areas_categories.category_name', 'interest_areas_sub_categories.*']);
        if($role_id==1){
            return view('admin.interestAreas.subcategory.list',compact('data','permission_array'));
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

        $data = InterestAreasCategory::all();
        if($role_id==1){
            return view('admin.interestAreas.subcategory.add_subcategory',compact('data','permission_array'));
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
                'cat_id'         =>  'required',
                'subcategory_name'         =>  'required',
            ], 
            [
                'cat_id.required' => 'Category is required',
                'subcategory_name.required' => 'Sub Category is required',
            ]
        );

        $dataArray  = InterestAreasSubCategory::create([
            "cat_id"  =>   $request->cat_id,
            "subcategory_name"  =>   $request->subcategory_name,
        ]);
        
        return redirect()->route('interestSubCategories.create')
                        ->with('success','Sub Category Added Successfully.');
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

        $category_data = InterestAreasCategory::all();
        $subcategory_data = InterestAreasSubCategory::find($id);

        if($role_id==1){
            return view('admin.interestAreas.subcategory.edit_subcategory',compact('category_data','subcategory_data','permission_array')); 
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

        /*$request->validate(
            [
                'subcategory_name'           =>  'required',
            ], 
            [
                'subcategory_name'            => 'Sub Category Name is required',
            ]
        );*/
      
        $data = array(
            "cat_id"  =>   $request->cat_id,
            "subcategory_name"  =>   $request->subcategory_name,
        );

        $update = InterestAreasSubCategory::where('id',$id)->update($data); 
        if($update){
            return redirect('interestSubCategories')->with("success","Sub Category Updated Successfully");
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
        $subcat = InterestAreasSubCategory::find($id);
        if(!is_null($subcat)){
            $subcat->delete();
        }
        return redirect()->route('interestSubCategories.index')
                        ->with("success","Sub Category Deleted Successfully");
    }
}
