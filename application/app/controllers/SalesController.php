<?php

/*
*	OrdersController
*
*	Handles backend functions
*/


class SalesController extends \BaseController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new OrdersRepository;

	}

	/**
	 * Display a listing of the client post(s).
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

			if ($hasAuthority == false)
			{
				return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
			}

		} else {

			return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
		}

		// - AUTHORITY CHECK ENDS HERE - //

		// Get data
		$entries = Orders::getSalesPaginateEntries(); 
 		$orderscount = DB::table('orders')->whereNull('deleted_at')->where('payment_status', 'zavrseno')->count();
        


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
		$dropdown_list = array();
		$dropdown = DB::table('users')->whereNull('deleted_at')->where('city', '!=', '0')->get();
		foreach($dropdown as $user){
			$city_name = DB::table('city')->where('id', $user->city)->pluck('name');
			$dropdown_list[$user->city] = $city_name;
		}

	
		
        

		$this->layout->title = 'Prodaja | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/datatables.js',
		);

		$this->layout->content = View::make('backend.sales.index', array('entries' => $entries, 'orders' => $orders, 'orderscount' => $orderscount, 'dropdown_list' => $dropdown_list));
	}


	/**
	 * Show the form for creating a new client post(s).
	 *
	 * @return Response
	 */

	public function show($id)
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


		$this->layout->title = 'Klijenti | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.sales.view');
	}


	/**
	 * Show the form for editing the specified client post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
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

		$entry = Orders::getEntries($id, 'false');
 		
		// Getting all clients
		$clientslist = array();

		$clients = User::getEntries();

		if ($clients['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($clients['entries'] as $clients)
		{
			$clientslist[$clients->id] = $clients->first_name . '  ' . $clients->last_name;
		}

		// Getting all products
		$productlist = array();

		$products = Products::getEntries(null, null, null, 'false');

		if ($products['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($products['entries'] as $products)
		{
			$productlist[$products->id] = $products->title . ' - ' . $products->producttitle . ' (' . $products->price . ' kn)';

		}

		$orderbycustomer = OrdersProducts::getOrderByCustomer($id);
        
        $allkeys = array_keys($clientslist);
		$first_value = reset($allkeys);
       
		$address = DB::table('users')->where('id', '=', $first_value)->pluck('address');
	 
	    $clientcity = DB::table('city')->join('users', 'users.city', '=', 'city.id')->where('users.id', $first_value)->pluck('name');

        $billingaddress = ($address . ', ' . $clientcity);



		$this->layout->title = 'Uređivanje klijenta | Stipino';

		$this->layout->css_files = array(
			'css/backend/summernote.css'
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/backend/bootstrap-datepicker.min.js'

		);

		$this->layout->content = View::make('backend.sales.edit', array('entry' => $entry['entry'], 'postRoute' => 'SalesUpdate', 'clientslist' => $clientslist, 'productlist' => $productlist, 'orderbycustomer' => $orderbycustomer['orderbycustomer'], 'billingaddress' => $billingaddress));
	}


	/**
	 * Update the specified client post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{


   

		Input::merge(array_map('trim', Input::except('products_array', 'quantity', 'singleprice')));
		$entryValidator = Validator::make(Input::all(), Orders::$store_rules);



		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}
		 
		$update = $this->repo->update(
			Input::get('id'),
			Input::get('order_id'),
			Input::get('user_id'),
			Input::get('order_date'),
			Input::get('products_array'),
			Input::get('quantity'),
			Input::get('shipping_way'),
			Input::get('payment_way'),
			Input::get('payment_status'),
			Input::get('shipping_address'),
			Input::get('billing_address'),
			Input::get('note')
		);

		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('SalesIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Remove the specified client post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
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
        
		if ($id == null)
		{
			return Redirect::route('SalesIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Orders::getEntries($id, null, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('SalesIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('SalesIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('SalesIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}

	public function search($search_input)
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

			if ($hasAuthority == false)
			{
				return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
			}

		} else {

			return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
		}

		// - AUTHORITY CHECK ENDS HERE - //



		// switch ($search_filter) {
		// 	case 'value':
		// 		# code...
		// 		break;
			
		// 	default:
		// 		# code...
		// 		break;
		// }

		$search_filter = $_GET['search_filter'];


		$entries;

		// Get data

		switch ($search_filter) {
			//users table
			case 'user_id':
			$entries = Orders::getFilter1SalesPaginateEntries('id', $search_input);
			break;
			case 'email':
			$entries = Orders::getFilter1SalesPaginateEntries('id', $search_input);
			break;
			case 'address':
			$entries = Orders::getFilter1SalesPaginateEntries($search_filter, $search_input);
			break;
			case 'city':
			$entries = Orders::getFilter1SalesPaginateEntries($search_filter, $search_input);
			break;
			case 'region':
			$entries = Orders::getFilter1SalesPaginateEntries($search_filter, $search_input);
			break;
			//orders table
			case 'order_date':
			$entries = Orders::getFilter2SalesPaginateEntries($search_filter, $search_input);
			break;
			default:
				'';
				break;
		}

		if(count($entries)<1){
			return 'Nema rezultata';
		}



		 
 		$orderscount = DB::table('orders')->whereNull('deleted_at')->where('payment_status', 'zavrseno')->count();
        

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

	
		 

		$this->layout->title = 'Prodaja | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/datatables.js',
		);

		return View::make('backend.sales.index-div', array('entries' => $entries, 'orders' => $orders, 'orderscount' => $orderscount));
	}

   public function getDropdownList($search_filter)
	{
	  $dropdown_list = array();
	  switch ($search_filter) {
			//users table
			case 'user_id':
			//$dropdown = DB::table('users')->whereNull('deleted_at')->get();
			$dropdown = Orders::getSaleClientList();
			foreach ($dropdown as $order) {
				$dropdown_list[$order->user_id] = $order->first_name . ' ' .$order->last_name;
			}
			break;
			case 'email':
			$dropdown = Orders::getSaleEmailList();
			foreach ($dropdown as $order) {
				$dropdown_list[$order->user_id] = $order->email;
			}
		
			break;
			case 'address':
			$dropdown = Orders::getSaleAddressList();
			foreach ($dropdown as $order) {
				$dropdown_list[$order->address] = $order->address;
			}
			break;
			case 'city':
			$dropdown = Orders::getSaleCityList();
			foreach ($dropdown as $order) {
				$dropdown_list[$order->city_id] = $order->city_name;
			}
			break;
			case 'region':
			$dropdown = Orders::getSaleRegionList();
			foreach ($dropdown as $order) {
				$dropdown_list[$order->region_id] = $order->region_name;
			}
			break;
			//orders table
			case 'order_date':
			$dropdown = DB::table('orders')->whereNull('deleted_at')->where('payment_status', 'zavrseno')->get();
			foreach ($dropdown as $order) {
				$dropdown_list[$order->order_date] = $order->order_date;
			}
			break;
			
			
			default:
				'';
				break;
		}
	



	  return View::make('backend.sales.index-dropdown', array('dropdown_list' => $dropdown_list));
	}





}
