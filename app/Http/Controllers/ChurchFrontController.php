<?php

namespace App\Http\Controllers;

use App\Church;

class ChurchFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $churches = Church::paginate(10);
        return view('churches.index', ['churches' => $churches]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Church $church)
    {
        return view('churches.show', ['church' => $church]);
    }
}
