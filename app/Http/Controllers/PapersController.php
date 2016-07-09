<?php namespace HelloWorld\Http\Controllers;

class PapersController extends Controller {

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
	 * Show the Papers to the user.
	 *
	 * @return Response
	 */
	public function index($param = '')
	{
		if($param == "")
		{
			$param = 1;
		}
		$pageLimit = 10;
		$limitMultiplier = $param-1;
		$limitStart = (($limitMultiplier == 0)?1:$limitMultiplier)*$pageLimit;
		$limitEnd = $limitStart + $pageLimit;
		$papersRecords = \DB::table('papers')->skip($limitStart)->take($pageLimit)->get();
		$papers = \DB::table('papers')->pagination(10);
         return view('papers', ['papers' => $papers, 'papersRecords' => $papersRecords]);
	}

}
