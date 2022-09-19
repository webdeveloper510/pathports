<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survey_Manages;
use App\Models\User;
use Auth;


class SurveyManageController extends Controller

{
    public function create(Request $request){
 
    foreach ($request->addMoreInputFields as $key => $value) {
  
                $survey = new Survey_Manages();
                $survey->user_id =  $value['user_id'];
                $survey->title =  $request->title;
                $survey->question = $value['question'];
                $survey->answer = $value['answer'];
                $survey->status = 1;
                $survey->save();

               
        }

        return response()->json([
        
            'success' => 200
        ]);

    }
    public function view(){

        return view('admin.survey.survey_view');
    }
}
