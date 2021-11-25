<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;

class WorkerLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct()
    {
      $this->middleware('guest:worker', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
      return view('auth.worker-login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('worker')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('dashboard.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('worker')->logout();
        return redirect('/');
    }

    

}
