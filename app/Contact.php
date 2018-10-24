<?php

namespace App;

use App\Http\Controllers\ImageController;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $fillable = [
		'church_id',
		'name',
		'role',
		'email',
		'phone',
		'vk',
		'facebook',
		'image'
	];

	public function church()
	{
		return $this->belongsTo(Church::class,'church_id', 'id');
	}

	public function getImageUrlAttribute(){
		return asset(ImageController::IMAGE_PATH . $this->image);
	}
}
