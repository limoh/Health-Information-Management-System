<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Health;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        return view('worker-profile')->with('user', auth()->user());
    }

    public function update(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'password' => 'sometimes|nullable|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        $input = $request->except('password', 'password_confirmation');

        if (! $request->filled('password')) {
            $user->fill($input)->save();

            return back()->with('success_message', 'Profile updated successfully!');
        }

        $user->password = bcrypt($request->password);
        $user->fill($input)->save();

        return back()->with('success_message', 'Profile (and password) updated successfully!');
    }


    
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $facility   =   User::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'name' => $request->name, 
                        'email' => $request->email,
                        'password' => $request->password,
                        'is_admin' => $request->is_admin,
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
        $facility  = Health::where($where)->first();
 
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
        $facility = User::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function health()
    {
        $data['healths'] = Health::orderBy('id','desc')->paginate(5);
   
        return view('worker-health',$data);
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function healthstore(Request $request)
    {

        $health   =   Health::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'names'             => $request->names, 
                        'facility'          => $request->facility,
                        'disease'           => $request->disease,
                        'symptomps_signs'   => $request->symptomps_signs,
                        'medication'        => $request->medication,
                        'efects'            => $request->efects,
                        'allergy'           => $request->allergy,
                        'blood_sugar'       => $request->blood_sugar,
                        'blood_pressure'    => $request->blood_pressure,
                        'height'            => $request->height,
                        'weight'            => $request->weight,
                        'created_at'        => $request->created_at,
                    ]);
    
        return response()->json(['success' => true]);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function healthedit(Request $request)
    {   

        $where = array('id' => $request->id);
        $health  = Health::where($where)->first();
 
        return response()->json($health);
    }
    
    public function healthupdate(Request $request)
    {

        $health   =   Health::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'names'           => $request->names, 
                        'facility'        => $request->facility,
                        'disease'         => $request->disease,
                        'symptomps_signs' => $request->symptomps_signs,
                        'medication'      => $request->medication,
                        'efects'          => $request->efects,
                        'allergy'         => $request->allergy,
                        'blood_sugar'     => $request->blood_sugar,
                        'blood_pressure'  => $request->blood_pressure,
                        'height'          => $request->height,
                        'weight'          => $request->weight,
                        'created_at'      => $request->created_at,
                    ]);
    
        return response()->json(['success' => true]);
    }
   
    public function show(Health $health)
    {
        
        
        return view('workershow-health', compact('health'));
    }

     public function healthshow(Health $health)
    {
        
        
        return view('show-healths', compact('health'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function healthdestroy(Request $request)
    {
        $health = Health::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
