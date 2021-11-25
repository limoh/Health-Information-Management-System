<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['worker','verified']);
    }

    public function index() 
    {
        return view('dashboard.index');
    }
}
