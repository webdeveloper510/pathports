<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterestAreasCategory;
use App\Models\InterestAreasSubCategory;
use App\Models\InterestAreas;

class InterestAreasController extends Controller
{
    public function index(){
        $interest_areas_category = InterestAreasCategory::all();
        $interest_areas_subcategory = InterestAreasSubCategory::all();
        $interest_areas = InterestAreas::all();
        $data = compact('interest_areas_category','interest_areas_subcategory','interest_areas');
        return view('backend.interestAreas.interestAreas')->with($data);
    }
    public function get_data(Request $request){
       $cat_id = $request->cat_id;
       //$interest_areas = InterestAreasSubCategory::all($cat_id);
       $interest_areas = InterestAreasSubCategory::where('cat_id', $cat_id)->get();
       return response()->json($interest_areas);
      //dd($interest_areas);die;


    }
    public function get_sub_data(Request $request){
       $subcat_id = $request->subcat_id;
       $interest_areas = InterestAreas::where('subcat_id', $subcat_id)->get();
       return response()->json($interest_areas);
    }
    
}
