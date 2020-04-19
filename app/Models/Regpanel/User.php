<?php

namespace App\Models\Regpanel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
	use SoftDeletes;
	use Notifiable;

	protected $fillable = [
		'name',
		'surname',
		'fathersname',
		'login',
		'email',
		'phone',
		'password',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function roles()
	{
		return $this->belongsToMany('App\Models\Role', 'user_roles');
	}

}
