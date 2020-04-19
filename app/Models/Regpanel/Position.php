<?php

namespace App\Models\Regpanel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
	 use SoftDeletes;

    protected $fillable = [
    	'title',
    	'description',
    	'created_user',
    	'status',
    ];
}
