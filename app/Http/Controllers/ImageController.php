<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
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

	//это для фронт контроллера
	public function imageFileDelete(Request $request)
	{
		$fileName = basename($request->get('file'));
		if (Image::where('file_name', $fileName)->first() !== null) {
			return response()->json(['message' => 'File not delete from server.'], 200);
		}
		return response()->json(['message' => 'File delete from server.'], 200);
	}

	//это для админского
	public function imageEntityDelete(Request $request)
	{
		$this->authorize('is_admin');
		$this->deleteFile($fileName = basename($request->get('file')));
		if (($image = Image::where('file_name', $fileName)->first()) !== null) {
			$image->delete();
		}
		return response()->json(['message' => 'File delete from server.'], 200);
	}

	private function deleteFile(string $fileName)
	{
		unlink(public_path() . '/' . self::IMAGE_PATH . $fileName);
	}
}