<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    	'name',
		'role',
		'email',
		'phone',
		'vk',
		'facebook',
		'picture'
	];
}
