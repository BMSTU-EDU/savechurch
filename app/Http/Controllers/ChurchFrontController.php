<?php

namespace App\Http\Controllers;

use App\Church;

class ChurchFrontController extends Controller
{
	public function index()
	{
		$churches = Church::paginate(10);
		return view('churches.index', ['churches' => $churches]);
	}

	public function indexMap()
	{
		return view('churches.map', ['churches' => Church::all()]);
	}

	public function show(Church $church)
	{
		return view('churches.show', ['church' => $church]);
	}
}
