<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterestAreasCategory;
use App\Models\InterestAreasSubCategory;
use App\Models\InterestAreas;
use App\Models\UserInterestAreas;
use App\Models\Assign_permission;
use App\Models\Permissions;
use Auth;
use Session;

class InterestAreasController extends Controller
{

   /*public function __construct()
   {
      
      $this->middleware(function ($request, $next) {
         $user = Auth::user();
         $role_id = $user['role_id'];
         $user_id = $user['id'];

         $all_permissions = Permissions::all();
         $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

         $permission_array= array();
         foreach($assign_permission as $per){
            array_push($permission_array,$per->permission_id);
         }
         Session::push('permissions', $permission_array);

         return $next($request);
         
      });
   }*/
   public function index(){

      $user = Auth::guard('web')->user();
      $role_id = $user['role_id'];
      $university_id = $user['university_id'];
      $user_id = $user['id'];

      $all_permissions = Permissions::all();
      $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

      $permission_array= array();
      foreach($assign_permission as $per){
         array_push($permission_array,$per->permission_id);
      }
     
      Session::push('permissions', $permission_array);

      if($role_id == 1 || $role_id == 2){
         $interest_areas_category = InterestAreasCategory::all();
      }
      if($role_id == 3){
         $interest_areas_category = InterestAreasCategory::where('id', '!=', 2)->orWhereNull('id')->get();
      }
      if($role_id == 4){
         $interest_areas_category = InterestAreasCategory::where('id', '!=', 1)->orWhereNull('id')->get();
      }
      
      $interest_areas_subcategory = InterestAreasSubCategory::all();
      $interest_areas = InterestAreas::all();
      $userInterestAreas = UserInterestAreas::all();
      
      $data = compact('interest_areas_category','interest_areas_subcategory','interest_areas','userInterestAreas','permission_array');
      return view('admin.interestAreas.interestAreas')->with($data);
   }

   public function get_data(Request $request){
      $cat_id = $request->cat_id;
      //$interest_areas = InterestAreasSubCategory::all($cat_id);
      $interest_areas = InterestAreasSubCategory::where('cat_id', $cat_id)->get();
      return response()->json($interest_areas);
   
   }

   public function get_sub_data(Request $request){
  
      $subcat_id = $request->subcat_id;
      $roles= $request->role;
      $user_id= $request->user_id;
     
      $interest_areas = InterestAreas::where('subcat_id', $subcat_id)->get();
     
      
      //return response()->json($interest_areas);
      
     
      $selected_interest = UserInterestAreas::join('interest_areas', 'user_interest_areas.interest_id', '=',        'interest_areas.id')->where('user_interest_areas.role_id',$roles)->where('user_interest_areas.subcat_id',$subcat_id)->where('user_interest_areas.user_id',$user_id)->get(['user_interest_areas.*','interest_areas.interest_area_name']);
     
      //echo json_encode($selected_interest);
      //return redirect()->back()->with('success','Interest Area Saved successfully.');

      echo json_encode(array(
         'interest_areas' => $interest_areas,
         'selected_interest' => $selected_interest,
        
      ));
   }


   public function storeInterestArea(Request $request){
 
      $user = Auth::guard('web')->user();
      $role_id = $user['role_id'];
      $user_id = $user['user_id'];
      $all_permissions = Permissions::all();
      $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();
      $permission_array= array();


      foreach($assign_permission as $per){
         array_push($permission_array,$per->permission_id);
      }
        
      $request->session()->put('permissions', $permission_array);

      $roles= $request->role;
      $user_id= $request->user_id;
      $subcat_id= $request->subcat_id;
      $interestAreaArray = $request->interestAreaArray;
      $all_interests = UserInterestAreas::where(['role_id' => $roles])->where(['user_id' => $user_id])->get();
      
         
      $delete_data = UserInterestAreas::where('subcat_id',$subcat_id)->where('role_id', $roles)->where('user_id', $user_id)->delete();

       foreach($interestAreaArray as $interest){
      
         $insert_data = UserInterestAreas::create([
   
            "role_id"  =>   $roles,
            "interest_id" => $interest,
            "subcat_id" => $subcat_id,
            "user_id" => $user_id,
            'status'  => 1,
         ]);
      }

        
   return redirect()->back()->with('success','Interest Area Saved successfully.');
   }


   public function interest_list(){

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


      $all_interests = InterestAreas::join('interest_areas_sub_categories', 'interest_areas_sub_categories.id', '=', 'interest_areas.subcat_id')
            ->get(['interest_areas_sub_categories.subcategory_name', 'interest_areas.*']);

      if($role_id==1){
         return view('admin.interestAreas.index',compact('all_interests','permission_array'));
      }
      else{
         return view('admin.restrict',compact('permission_array'));
      }

   }
   public function add_interest_areas(){

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

      $interest_areas_category = InterestAreasCategory::all();
      $interest_areas_subcategory = InterestAreasSubCategory::all();
      if($role_id==1){
         return view('admin.interestAreas.add_interestareas',compact('permission_array','interest_areas_category','interest_areas_subcategory'));
      }
      else{
         return view('admin.restrict',compact('permission_array'));
      }
   }

   public function save_interest_areas(Request $request){
      //dd($request->all());
      $interest_areas_category= $request->interest_areas_category;
      $subcat_id = $request->interest_areas_subcategory;
      $interest_areas = $request->interest_areas;

  
            $request->validate(
            [
                'interest_areas_category'  =>  'required',
                'interest_areas_subcategory'  =>  'required',
                'interest_areas' =>  'required',
            ], 
            [
                'interest_areas_category.required' => 'Category is required',
                'interest_areas_subcategory.required' => 'Sub Category is required',
                'interest_areas.required' => 'Interest Area is required',
            ]
         );
  
      
      

      $insert_data = InterestAreas::create([
            "subcat_id" => $subcat_id,
            "interest_area_name" => $interest_areas,
      ]);
      return redirect()->back()->with('success','Interest Area Added successfully.');
   }

   public function edit_interestArea($id){
      $user = Auth::guard('web')->user();
      $role_id = $user['role_id'];
      $university_id = $user['university_id'];
      $user_id = $user['id'];

      $all_permissions = Permissions::all();
      $assign_permission = Assign_permission::where('role_id',$role_id)->where('status',1)->get();

      $permission_array= array();
      foreach($assign_permission as $per){
         array_push($permission_array,$per->permission_id);
      }
     
      Session::push('permissions', $permission_array);

      $category_data = InterestAreasCategory::all();
      $subcategory_data = InterestAreasSubCategory::all();

      $interest_data = InterestAreas::join('interest_areas_sub_categories', 'interest_areas_sub_categories.id', '=', 'interest_areas.subcat_id')->where('interest_areas.id',$id)->get(['interest_areas_sub_categories.subcategory_name', 'interest_areas.*']);

      //$interest_data = InterestAreas::find($id);
      if($role_id==1){
         return view('admin.interestAreas.edit_interestareas',compact('category_data','subcategory_data','interest_data','permission_array'));
      }
      else{
         return view('admin.restrict',compact('permission_array'));
      }
   }

   public function update_interestArea(Request $request, $id){
      $data = array(
            "subcat_id"  =>   $request->subcat_id,
            "interest_area_name"  =>   $request->interest_area_name,
      );

      $update = InterestAreas::where('id',$id)->update($data); 
         if($update){
            return redirect()->back()->with("success","Interest Areas Updated Successfully");
         }   
   }
   public function destroy_interestArea($id){
      $interest_area = InterestAreas::find($id);
      if(!is_null($interest_area)){
         $interest_area->delete();
      }
      return redirect()->back()->with("success","Interest Areas Deleted Successfully");
   }
}
