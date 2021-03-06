<?php

namespace App\Http\Controllers;

use App\Church;
use App\Contact;
use App\Http\Requests\ChurchStoreRequest;
use App\Image;
use Illuminate\Http\Request;

class ChurchController extends Controller
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Responsesad
	 */
	public function index()
	{
		$churches = Church::paginate(10);
		return view('admin.church.index', ['churches' => $churches]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
	public function create()
	{
		return view('admin.church.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ChurchStoreRequest $request)
	{
		$church = Church::create($request->validated());
		$this->saveContact($church, $request);
		$this->saveChurchImages($church, $request);
		return redirect(route('churches.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Church $church
	 * @return \Illuminate\Http\Response
	 */
	public function show(Church $church)
	{
		return view('admin.church.show', ['church' => $church]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Church $church
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Church $church)
	{
		return view('admin.church.edit', ['church' => $church]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Church $church
	 * @return \Illuminate\Http\Response
	 */
	public function update(ChurchStoreRequest $request, Church $church)
	{
		$church->update($request->validated());
		$this->saveContact($church, $request);
		$this->saveChurchImages($church, $request);
		return redirect(route('churches.index'));
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
		$church->delete();
		return redirect(route('churches.index'));
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

	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function flushTrashed()
	{
		Church::onlyTrashed()->forceDelete();
		return back();
	}

	/**
	 * @param $church_id
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function restoreTrashed($church_id)
	{
		Church::withTrashed()->where('id', $church_id)->restore();
		return redirect(route('admin.churches.list.trashed'));
	}

	private function saveChurchImages(Church $church, Request $request)
	{
		$images = [];
		$existImages = $church->images()->pluck('file_name')->toArray();
		foreach ($request->get('images') as $imageFileName) {
			$imageFileName = basename($imageFileName);
			if (file_exists(public_path() . '/' . ImageController::IMAGE_PATH . $imageFileName)
				&& !in_array($imageFileName, $existImages))
				$images[] = new Image(['file_name' => $imageFileName]);
		}
		$church->images()->saveMany($images);
	}

	private function saveContact(Church $church, ChurchStoreRequest $request)
	{
		$image = $request->file('contact_image');
		$url = $image->storePublicly('public/images');
		Contact::updateOrCreate([
			'church_id' => $church->id
		], [
			'name' => $request->get('contact_name'),
			'role' => $request->get('contact_role'),
			'email' => $request->get('contact_email'),
			'phone' => $request->get('contact_phone'),
			'vk' => $request->get('contact_vk'),
			'facebook' => $request->get('contact_facebook'),
			'image' => $fileName = basename($url),
		]);
	}
}
