<?php

namespace App\Http\Controllers;

use App\Church;
use http\Env\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        return view('admin.home');
    }
}
