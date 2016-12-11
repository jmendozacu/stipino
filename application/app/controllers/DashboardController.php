<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{

		// - CHECK IF USER IS LOGGED IN - //
		if (Auth::check())
		{
			$user = User::getUserInfos(Auth::user()->id);

			if ($user['status'] == 0)
			{
				return Redirect::route('AdminSignIn')->with('error_message', Lang::get('messages.not_logged_in'));
			}
			// - AUTHORITY CHECK STARTS HERE - //
			$hasAuthority = false;

			switch ($user['user']->user_group)
			{
				case 'admin':
				// Admins should have authority
				$hasAuthority = true;
				break;
				default:
				return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
			}

			if ($hasAuthority == false)			{
				return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
			}

		} else {

			return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
		}
		// - AUTHORITY CHECK ENDS HERE - //		 
		$images = Media::getEntries(null, null, '8', 'false');

		$blogposts = Blog::getEntries(null, null, '5', null, 'false');
         
		$pages = Pages::getEntries(null, null, '5');

		$widgets = Widget::getEntries(null, null, '5');

		$workshops = Workshop::getEntries(null, null, '5', 'false');

		$products = Products::getEntries(null, null, '5', 'false');

		$imagescount = DB::table('media')->whereNull('deleted_at')->count();
		$orderscount = DB::table('orders')->whereNull('deleted_at')->count();
		$blogcount = DB::table('cms')->where('cms.type', '=', 'blog')->whereNull('deleted_at')->count();
		$widgetcount = DB::table('cms')->where('cms.type', '=', 'widget')->whereNull('deleted_at')->count();
		$pagescount = DB::table('cms')->where('cms.type', '=', 'page')->whereNull('deleted_at')->count();
        $workshopcount = DB::table('cms')->where('cms.type', '=', 'workshop')->whereNull('deleted_at')->count();
        $productscount = DB::table('products')->whereNull('deleted_at')->count();



		// Get data
		$entries = Orders::getEntries(null, null, '5');  

		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
 
		$orders = array();
		$productdata = array();
 		$userdata = array();
 		$ordersdata = array();

 		

		foreach ($entries['entries'] as $order)
		{
			$productdata = OrdersProducts::getEntries($order->id);
 			$userdata = User::getEntries($order->user_id);
 			$ordersdata = Orders::getEntries($order->id, 'false');

			array_push($productdata, $userdata, $ordersdata);

			$orders[] = $productdata;

		}
   



		$this->layout->title = 'Admin | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
		'js/backend/datatables.js',
		);



		$this->layout->content = View::make('backend.dashboard', array('images' => $images['entries'], 'blogposts' => $blogposts['entries'], 'pages' => $pages['entries'], 'widgets' => $widgets['entries'], 'imagescount' => $imagescount, 'pagescount' => $pagescount, 'widgetcount' => $widgetcount, 'blogcount' => $blogcount, 'workshopcount' => $workshopcount, 'productscount' => $productscount, 'workshops' => $workshops['entries'], 'products' => $products['entries'], 'orderscount' => $orderscount, 'entries' => $entries['entries'], 'orders' => $orders));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
