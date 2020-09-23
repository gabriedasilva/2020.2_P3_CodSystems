<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (session()->get('isLoggedIn') === true) {
			return view('Home/home');
		}else{
			return view('Login');
		}
	}

	//--------------------------------------------------------------------

}
