<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\University;



class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $university = University::all();
        $data = compact('university');
        return view('backend.university.university_list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        return view('backend.university.adduniversity');  
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
                'uni_name'              =>      'required|string|max:255',
                'uni_slug'              =>      'required',
                'uni_email'             =>      'required|email|unique:users,email',
                'uni_desc'              =>      'required|string',
                'uni_address'           =>      'required|string',
                'uni_contact'               =>      'required|numeric|digits:10',
                'uni_alternate_contact' =>      'required|string',
                //'uni_image' => 'mimes:jpg,jpeg,png,pdf|max:10000'
            ], 
            [
                'uni_name.required' => 'University Name is required',
                'uni_slug.required' => 'University Slug Name is required',
                'uni_email.required' => 'Email is required',
                'uni_desc.required' => 'Description is required',
                'uni_address.required' => 'Address is required',
                'uni_contact.required' => 'Contact is required',
                'uni_alternate_contact.required' => 'Alternate Contact is required',
            ]
        );
      
        
        $imageName = time().'.'.$request->uni_image->extension();  

        $request->uni_image->move(public_path('assets/backend/images'), $imageName);

        //$name = $request->file('uni_image')->getClientOriginalName();
 
        //$path = $request->file('uni_image')->store('public/assets/backend/images');
        
        $dataArray  = University::create([
       
            "uni_name"  =>   $request->uni_name,
            "uni_slug"  =>   Str::slug($request->uni_slug),
            "uni_email" =>   $request->uni_email,
            "uni_desc"   =>  $request->uni_desc,
            "uni_address" =>  $request->uni_address,
            "uni_contact" =>  $request->uni_contact,
            "uni_alternate_contact" =>  $request->uni_alternate_contact,        
            "uni_image"           =>  $imageName,
        ]);

        
        return redirect()->route('backend.universities.create')
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

        $university = University::find($id);

        // return response()->json([
        //     'status' => 200,
        //     'university' => $university,
        // ]);
        return view('backend.university.edit_university',compact('university'));  

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
        /*$uni_id = $request->input('uni_id');
        $university = University::find($id);
        $university->uni_name = $request->input('uni_name');
        $university->uni_email = $request->input('uni_email');
        $university->uni_desc = $request->input('uni_desc');
        $university->uni_address = $request->input('uni_address');
        $university->update();
        return redirect()->back();*/

       // $filename='';
        //if($request->hasfile('uni_image')){
            $file = $request->file('uni_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;  
            $file->move('assets/backend/images', $filename);
       // }
       
        $data = array(
                        "uni_name"      => $request->uni_name,
                        "uni_email"     => $request->uni_email,
                        "uni_desc"      => $request->uni_desc,
                        "uni_address"   => $request->uni_address,
                        "uni_contact"   => $request->uni_contact,
                        "uni_alternate_contact"   => $request->uni_alternate_contact,
                        "uni_image"  => $filename,
                    );
        $update = University::where('id',$id)->update($data); 
        if($update){
            return redirect('backend/universities')->with("success","Success univeristy Edit");
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
        return redirect('backend/universities');
        //return redirect()->route('backend.university.index');
    }

}

