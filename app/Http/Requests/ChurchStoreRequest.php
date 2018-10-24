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
			'images' => 'required|array|min:1',
			'contact_name' => 'required|max:150',
			'contact_role' => 'required|max:150',
			'contact_email' => 'sometimes|max:150|required_without_all:contact_phone,contacts_vk,contacts_facebook',
			'contact_phone' => 'sometimes|max:150|required_without_all:contacts_email,contacts_vk,contacts_facebook',
			'contact_vk' => 'sometimes|max:150|required_without_all:contacts_email,contacts_phone,contacts_facebook',
			'contact_facebook' => 'sometimes|max:150|required_without_all:contacts_phone,contacts_vk,contacts_email',
			'contact_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:512'
		];
	}
}
