<?php

namespace App\Http\Requests;

use App\Rules\FileExist;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChurchStoreRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|max:150',
			'address' => 'max:300',
			'latitude' => 'nullable|numeric|required_with:longitude',
			'longitude' => 'nullable|numeric|required_with:latitude',
			'description' => 'nullable',
			'purpose' => 'nullable',
			'images' => 'required'
		];
	}
}
