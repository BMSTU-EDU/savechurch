<?php

namespace App;

use App\Http\Controllers\ImageController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Church extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'name',
		'address',
		'coordinates',
		'description',
		'purpose',
        'latitude',
        'longitude'
	];

	protected $with = ['images', 'contact'];

	public function images()
	{
		return $this->hasMany(Image::class, 'church_id', 'id');
	}

	public function contact(){
		return $this->hasOne(Contact::class, 'church_id', 'id');
	}

	public function getImageUrlArrayAttribute()
	{
		return array_map(function ($imageName) {
			return asset(ImageController::IMAGE_PATH . $imageName);
		}, $this->images()->pluck('file_name')->toArray());
	}
}
