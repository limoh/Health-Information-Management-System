<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Health;

class HealthinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['healths'] = Health::orderBy('id','desc')->paginate(5);
   
        return view('health-info',$data);
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $health   =   Health::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'names' => $request->names, 
                        'facility' => $request->facility,
                        'disease' => $request->disease,
                        'symptomps_signs' => $request->symptomps_signs,
                        'medication' => $request->medication,
                        'efects' => $request->efects,
                        'allergy' => $request->allergy,
                        'blood_sugar'     => $request->blood_sugar,
                        'blood_pressure'  => $request->blood_pressure,
                        'height'          => $request->height,
                        'weight'          => $request->weight,
                        'created_at' => $request->created_at,
                    ]);
    
        return response()->json(['success' => true]);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   

        $where = array('id' => $request->id);
        $health  = Health::where($where)->first();
 
        return response()->json($health);
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $health = Health::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }

}
