<?php namespace HelloWorld\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
// use HelloWorld\Http\Requests\Request;
use Illuminate\Routing\Controller as ControllerNew;

class LoginController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::isMethod('post'))
		{
			$login_username = Request::input('ui_login_username', '');
			$login_password = Request::input('ui_login_password', '');
			if($login_username && $login_password)
			{
				if(in_array($login_username, array('chpm','chsn')) && $login_password == "Sai123!@#")
				{
					return redirect()->route('papers');
				}
			}
		} else {
			return view('login');
		}
	}

}
