<?php

namespace App;

use App\Http\Controllers\ImageController;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = ['church_id', 'file_name'];

	public function getImageUrlAttribute()
	{
		return asset(ImageController::IMAGE_PATH . $this->file_name);
	}
}
