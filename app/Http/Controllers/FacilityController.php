<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FacilityController extends Controller
{
    public function index()
    {
        
        return view('profile')->with('user', auth()->user());
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function facility()
    {
        $data['facilitys'] = User::orderBy('id','desc')->paginate(5);
   
        return view('all-facilities',$data);
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
        $facility  = User::where($where)->first();
 
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

}
