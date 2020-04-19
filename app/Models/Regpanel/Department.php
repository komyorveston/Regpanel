<?php

namespace App\Models\Regpanel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'title',
    	'parent_id',
    	'description',
    	'img',
    	'created_user',
    	'status',
    ];


    /**For search category children in edit category **/
    public function children(){
    	return $this->hasMany('App\Models\Regpanel\Department', 'parent_id');
    }
}
