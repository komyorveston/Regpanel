<?php

namespace App\Http\Controllers\Regpanel\Panel;

use App\Http\Controllers\Regpanel\BaseController as MainBaseController;
use Illuminate\Http\Request;
use App\Http\Middleware;

abstract class PanelBaseController extends MainBaseController

{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('status');
	}
}
