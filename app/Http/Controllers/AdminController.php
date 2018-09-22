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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function churchesList()
    {
        $churches = Church::paginate(10);
        return view('admin.church.index', ['churches' => $churches]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function trashedChurches()
    {
        $churches = Church::onlyTrashed()->paginate(10);
        return view('admin.church.trashed', ['churches' => $churches]);
    }

    public function flushTrashed()
    {
        Church::onlyTrashed()->forceDelete();
        return back();
    }

    public function restoreTrashed($church_id)
    {
        Church::withTrashed()->where('id', $church_id)->restore();
        return redirect(route('admin.churches.list.trashed'));
    }
}
