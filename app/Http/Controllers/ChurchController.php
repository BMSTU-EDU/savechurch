<?php

namespace App\Http\Controllers;

use App\Church;
use App\Http\Requests\ChurchStoreRequest;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $churches = Church::paginate(15);

		return view('churches.index', ['churches' => $churches]);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
    public function create()
    {
		$this->authorize('is_admin');

		return view('admin.church.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChurchStoreRequest $request)
    {
		Church::create($request->validated());

		return redirect(route('admin.churches.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function show(Church $church)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function edit(Church $church)
    {
		return view('admin.church.edit', ['church' => $church]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function update(ChurchStoreRequest $request, Church $church)
    {
        $church->update($request->validated());
		return redirect(route('admin.churches.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Church $church
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Church $church)
    {
        $this->authorize('is_admin');
        $church->delete();
        return redirect(route('admin.churches.list'));
    }
}
