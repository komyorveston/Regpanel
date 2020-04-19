<?php

namespace App\Models\Regpanel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stuff extends Model
{
	 use SoftDeletes;
     const ROLE_PUBLISHER = 1;
     
    protected $fillable = [

    		'department_id',
    		'organization_id',
    		'position_id',
    		'name',
    		'surname',
    		'fathersname',
    		'email',
    		'phone',
    		'description',
    		'status',
    		'img',
    		'created_user',
    ];
}
