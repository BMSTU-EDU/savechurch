<?php

namespace App\Http\Controllers;

use App\Church;

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
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$this->authorize('is_admin');
		return view('admin.home');
	}

	/**
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
	public function churchesList()
	{
		$this->authorize('is_admin');
		$churches = Church::paginate(10);
		return view('admin.church.index', ['churches' => $churches]);
	}
}
