<?php

namespace App\Http\Controllers\Regpanel\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MetaTag;

class MainController extends PanelBaseController
{

	public function index()
	{
		MetaTag::setTags(['title' => 'Панель регистрации']);
		return view('regpanel.panel.main.index');
	}

}
