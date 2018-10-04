<?php

namespace App;

use App\Http\Controllers\UploadImageController;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = ['church_id', 'file_name'];

	public function getImageUrlAttribute()
	{
		return asset(UploadImageController::IMAGE_PATH . $this->file_name);
	}
}
