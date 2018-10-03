<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;

class UploadImageController extends Controller
{
	public const IMAGE_PATH = 'storage/images/';

	public function uploadImage(ImageUploadRequest $request)
	{
		$image = $request->file('image');
		$url = $image->storePublicly('public/images');
		$fileName = basename($url);
		return response()->json([
			'src' => asset(self::IMAGE_PATH . $fileName),
			'filename' => $fileName
		]);
	}
}