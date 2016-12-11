<?php

/*
*	ClientsController
*
*	Handles backend functions
*/


class ClientsController extends \BaseController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new ClientsRepository;

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

		$entries = User::getEntries(null, null);
		$paginate = User::getPaginateEntries(null, null);
        $clientcount = DB::table('users')->where('user_group', '!=', 'admin')->whereNull('deleted_at')->count();
        
        foreach ($paginate['entries'] as $entry) {
           
           if($entry->area != ''){
           $area = Area::getEntries($entry->area, null);
          
           $entry->area = $area['entry']->name . ' | ' . $area['entry']->cityname;

         }

        }
        


		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$this->layout->title = 'Klijenti | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/datatables.js',
		);
		$this->layout->content = View::make('backend.clients.index', array('entries' => $entries['entries'], 'paginate' => $paginate['entries'], 'clientcount' => $clientcount));
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
				// Getting all cities
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


		$allkeys = array_keys($arealist);
		$first_key= reset($allkeys);
		$firstcity = DB::table('area')->where('area.id', $first_key)->pluck('city');

		
    



		$this->layout->title = 'Unos novog klijenta | Stipino';

		$this->layout->css_files = array(
			'css/backend/trumbowyg.min.css',
			'css/backend/trumbowyg.colors.min.css',
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			
			'js/backend/trumbowyg.js',
			'js/backend/trumbowyg.base64.min.js',
			'js/backend/trumbowyg.colors.min.js',
			'js/backend/trumbowyg.noembed.min.js',
			'js/backend/trumbowyg.pasteimage.min.js',
			'js/backend/trumbowyg.preformatted.min.js',
			'js/backend/trumbowyg.upload.js',

			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
		);

		$this->layout->content = View::make('backend.clients.create', array('postRoute' => 'ClientsStore', 'citieslist' => $citieslist, 'regionslist' => $regionslist, 'arealist' => $arealist, 'firstcity' => $firstcity));
	}


	/**
	 * Store a newly created client post(s) in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

 
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), User::$client_store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}	

		$store = $this->repo->store(
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('type'),
			Input::get('oib'),
			Input::get('email'),
			Input::get('additional_email'),
			Input::get('block'),
			Input::get('contact_person'),
			Input::get('phone'),
			Input::get('additional_phone'),
			Input::get('permalink'),
			Input::get('username'),
			Input::get('user_group'),
			Input::get('password'),
			Input::get('area'),
			Input::get('address'),
			Input::get('city'),
			Input::get('region'),
			Input::get('note')
		);

		

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			
		 	return Redirect::route('ClientsIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		
		}
		
	}


	/**
	 * Display the specified client post(s).
	 *
	 * @param  int  $id
	 * @return Response
	 */

public function storefromorder()
	{


		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), User::$client_store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}	

		$store = $this->repo->store(
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('type'),
			Input::get('oib'),
			Input::get('email'),
			Input::get('additional_email'),
			Input::get('block'),
			Input::get('contact_person'),
			Input::get('phone'),
			Input::get('additional_phone'),
			Input::get('permalink'),
			Input::get('username'),
			Input::get('user_group'),
			Input::get('password'),
			Input::get('area'),
			Input::get('address'),
			Input::get('city'),
			Input::get('region'),
			Input::get('note')
		);

		

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			
			return Redirect::route('OrdersCreateFromClient')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		
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

		$this->layout->content = View::make('backend.clients.view');
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

		// Get data
				// Getting all cities
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

		
 		 
		$entry = User::getEntries($id, null);


		$orders = DB::table('orders')->where('user_id', $id)->whereNull('deleted_at')->get();
		$orderdata = array();
		

		foreach ($orders as $key => $order) {
		   $orderdata[] = OrdersProducts::getEntries($order->id);
		   
		}


		$interactions = Interactions::getEntries($id);




		if ($entry['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Uređivanje klijenta | Stipino';

		$this->layout->css_files = array(
			'css/backend/summernote.css'
			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'

		);

		$this->layout->content = View::make('backend.clients.edit', array('entry' => $entry['entry'], 'postRoute' => 'ClientsUpdate', 'citieslist' => $citieslist, 'regionslist' => $regionslist, 'arealist' => $arealist, 'orders' => $orders, 'orderdata' => $orderdata, 'interactions' => $interactions['entry'] ));
	}


	/**
	 * Update the specified client post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), User::$client_store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}
		 
		$update = $this->repo->update(
			Input::get('id'),
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('type'),
			Input::get('oib'),
			Input::get('email'),
			Input::get('additional_email'),
			Input::get('block'),
			Input::get('contact_person'),
			Input::get('phone'),
			Input::get('additional_phone'),
			Input::get('permalink'),
			Input::get('username'),
			Input::get('user_group'),
			Input::get('password'),
			Input::get('area'),
			Input::get('address'),
			Input::get('city'),
			Input::get('region'),
			Input::get('note')
		);

		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('ClientsIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
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
			return Redirect::route('ClientsIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = User::getEntries($id, null, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('ClientsIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('ClientsIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('ClientsIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}
