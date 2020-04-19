<?php

namespace App\Models\Regpanel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Organization extends Model
{

    use SoftDeletes;
    protected $fillable = 
    [
    	'title',
    	'description',
    	'img',
    	'created_user',
    	'status',
    ];
}
