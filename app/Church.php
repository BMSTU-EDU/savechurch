<?php

namespace App;

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
		'purpose'
    ];
}
