<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Health;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chwCount      = User::where('is_admin','=','2')->count();
        $facilityCount = User::where('is_admin', '=', '0')->count();
        return view('home', compact('facilityCount', 'chwCount'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $chwCount      = User::where('is_admin','=','2')->count();
        $facilityCount = User::where('is_admin', '=', '0')->count();
        return view('adminHome', compact('facilityCount', 'chwCount'));
    }
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function workerHome()
    {
        $chwCount      = User::where('is_admin','=','2')->count();
        $facilityCount = User::where('is_admin', '=', '0')->count();
        return view('workerHome', compact('facilityCount', 'chwCount'));
    }
}
