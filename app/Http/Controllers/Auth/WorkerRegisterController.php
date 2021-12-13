<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Worker;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class WorkerRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    
    public function __construct()
    {
      $this->middleware('guest:worker', ['except' => ['logout']]);
    }
    
    public function showRegisterForm()
    {
      return view('auth.worker-register');
    }

    public function workerregister(Request $request)
    {
        $request->validate([
            'names'         => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:workers'],
            'phone'         => ['required', 'string', 'max:255'],
            'national_ID'   => ['required', 'string', 'max:255'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Auth::login($user = Worker::create([
            'names'          => $request->names,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'national_ID'   => $request->national_ID,
            'password'      => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect('email/verify');
    }

        public function register(RegisterRequest $request) 
{
            $user = Worker::create($request->validated());

                event(new Registered($user));

                auth()->login($user);

            return redirect('/')->with('success', "Registration successfully.");
}
   
   
}
