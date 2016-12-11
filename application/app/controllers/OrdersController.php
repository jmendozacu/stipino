<?php

/*
*	OrdersController
*
*	Handles backend functions
*/


class OrdersController extends \BaseController {

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
		$entries = Orders::getPaginateEntries(); 
 		$orderscount = DB::table('orders')->whereNull('deleted_at')->count();
        


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

	
		
        

		$this->layout->title = 'Narudžbe | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/datatables.js',
		);

		$this->layout->content = View::make('backend.orders.index', array('entries' => $entries, 'orders' => $orders, 'orderscount' => $orderscount));
	}


	/**
	 * Show the form for creating a new client post(s).
	 *
	 * @return Response
	 */
	public function create()
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
		// Get data
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

		$products = Products::getEntries(null,null,null,null);

		if ($products['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($products['entries'] as $products)
		{
			$productlist[$products->id] = $products->title . ' - ' . $products->producttitle . ' (' . $products->price . ' kn)';

		}

		$singleprices = Products::getPrices();
		//goDie($singleprices);
 		$lastordernumber = Orders::getLastBill();
        $newordernumber = 0;
 		if(DB::table('orders')->count() > 0){
        $newordernumber = $lastordernumber['entry']->order_id + 1;
 		}
 		

 		$citieslist = array();

		$cities = City::getEntries();

		if ($cities['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($cities['entries'] as $cities)
		{
			$citieslist[$cities->id] = $cities->name;

		}
  
		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($regions['entries'] as $regions)
		{
			$regionslist[$regions->id] = $regions->name;

		}


		// Getting all areas
		$arealist = array();

		$areas = Area::getEntries();

		if ($areas['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($areas['entries'] as $areas)
		{
			$arealist[$areas->id] = $areas->name . ' | ' . $areas->cityname;

		}

		$allkeys = array_keys($clientslist);
		$first_value = reset($allkeys);
       
		$address = DB::table('users')->where('id', '=', $first_value)->pluck('address');
	 
	    $clientcity = DB::table('city')->join('users', 'users.city', '=', 'city.id')->where('users.id', $first_value)->first();

        $billingaddress = ($address . ', '. $clientcity->zip . ' ' . $clientcity->name);
        
       
		$this->layout->title = 'Unos nove narudžbe | Stipino';

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

		$this->layout->content = View::make('backend.orders.create', array('postRoute' => 'OrdersStore', 'clientslist' => $clientslist, 'productlist' => $productlist, 'singleprices' => $singleprices, 'newordernumber' => $newordernumber,'citieslist' => $citieslist, 'regionslist' => $regionslist, 'arealist' => $arealist, 'billingaddress' => $billingaddress));
	}


	/**
	 * Store a newly created client post(s) in storage.
	 *
	 * @return Response
	 */

public function createfromclient()
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
		// Get data
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

		$products = Products::getEntries(null,null,null,null);

		if ($products['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($products['entries'] as $products)
		{
			$productlist[$products->id] = $products->title . ' - ' . $products->producttitle . ' (' . $products->price . ' kn)';

		}

		$singleprices = Products::getPrices();
		//goDie($singleprices);
 		$lastordernumber = Orders::getLastBill();
        $newordernumber = 0;
 		if(DB::table('orders')->count() > 0){
        $newordernumber = $lastordernumber['entry']->order_id + 1;
 		}
 		

 		$citieslist = array();

		$cities = City::getEntries();

		if ($cities['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($cities['entries'] as $cities)
		{
			$citieslist[$cities->id] = $cities->name;

		}
  
		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($regions['entries'] as $regions)
		{
			$regionslist[$regions->id] = $regions->name;

		}


		// Getting all areas
		$arealist = array();

		$areas = Area::getEntries();

		if ($areas['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($areas['entries'] as $areas)
		{
			$arealist[$areas->id] = $areas->name . ' | ' . $areas->cityname;

		}

		$client = DB::table('users')->orderBy('created_at', 'desc')->first();
		
		$address = $client->address;
	 
	    $clientcity = DB::table('city')->join('users', 'users.city', '=', 'city.id')->where('users.id', $client->id)->first();

        $billingaddress = ($address . ', '. $clientcity->zip . ' ' . $clientcity->name);

        
        
       
		$this->layout->title = 'Unos nove narudžbe | Stipino';

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

		$this->layout->content = View::make('backend.orders.create', array('postRoute' => 'OrdersStore', 'clientslist' => $clientslist, 'productlist' => $productlist, 'singleprices' => $singleprices, 'newordernumber' => $newordernumber,'citieslist' => $citieslist, 'regionslist' => $regionslist, 'arealist' => $arealist, 'billingaddress' => $billingaddress, 'client' => $client));
	}


	/**
	 * Store a newly created client post(s) in storage.
	 *
	 * @return Response
	 */

	public function store()
	{
        
      
		 Input::merge(array_map('trim', Input::except('products_array', 'quantity', 'singleprice')));

		 $entryValidator = Validator::make(Input::all(), Orders::$store_rules);
		 
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$store = $this->repo->store(
			Input::get('order_id'),
			Input::get('user_id'),
			//Input::get('order_date'),
			date("Y-m-d"),
			Input::get('products_array'),
			Input::get('quantity'),
			Input::get('shipping_way'),
			Input::get('payment_way'),
			Input::get('payment_status'),
			Input::get('billing_address'),
			Input::get('shipping_address'),
			Input::get('note')
			
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('OrdersIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Display the specified client post(s).
	 *
	 * @param  int  $id
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

		$this->layout->content = View::make('backend.orders.view');
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

		$this->layout->content = View::make('backend.orders.edit', array('entry' => $entry['entry'], 'postRoute' => 'OrdersUpdate', 'clientslist' => $clientslist, 'productlist' => $productlist, 'orderbycustomer' => $orderbycustomer['orderbycustomer'], 'billingaddress' => $billingaddress));
	}


	/**
	 * Update the specified client post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        

        if(count(Input::get('products_array'))==1){
        
        return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'));

        }

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
			return Redirect::route('OrdersIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
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
			return Redirect::route('OrdersIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Orders::getEntries($id, null, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('OrdersIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('OrdersIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('OrdersIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}
