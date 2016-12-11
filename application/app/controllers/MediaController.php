<?php

class MediaController extends \BaseController {


	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new MediaRepository;
 
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

		public function index()
	{
		$entries = Media::getEntries(null, null, null, 'true');

		$mediacount = DB::table('media')->whereNull('deleted_at')->count();

		$this->layout->description = 'Pronađite svog zubara. Dentist finder je aplikacija za povezivanje pacijenata i zubara.';

		$this->layout->keywords = 'pronađite zubara, Dentist finder, dentist, zubari, pacijenti, pregled zuba';

		$this->layout->bodyclass = 'nav-on-header';

		$this->layout->title = 'Media | Stipino' ;

		$this->layout->css_files = array( 
		
		);

		$this->layout->js_footer_files = array( 
		 'js/backend/datatables.js'
		); 

		$this->layout->content = View::make('backend.media.index', array('entries' => $entries['entries'], 'mediacount' => $mediacount));
	}
 

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	
	public function create()
	{
		 
		$this->layout->description = 'Pronađite svog zubara. Dentist finder je aplikacija za povezivanje pacijenata i zubara.';

		$this->layout->keywords = 'pronađite zubara, Dentist finder, dentist, zubari, pacijenti, pregled zuba';

		$this->layout->bodyclass = 'nav-on-header';

		$this->layout->title = 'Unos medija | Stipino' ;

		$this->layout->css_files = array( 
		
		);

		$this->layout->js_footer_files = array( 
		
		); 

		$this->layout->content = View::make('backend.media.create', array('postRoute' => 'MediaStore'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	 

		$entryValidator = Validator::make(Input::all(), Media::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}


		$store = $this->repo->store(
			Input::file('image')

		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('MediaIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($permalink) {
 

		$this->layout->description = 'Predajte upit za stomatološku uslugu putem dentist-finder aplikacije.';

		$this->layout->keywords = 'Dentist finder, dentist, zubari, pacijenti, pregled zuba';

		$this->layout->bodyclass = 'nav-on-header';

		$this->layout->title = 'Pogledajte objavu';
 
		$this->layout->css_files = array( 
		);

		$this->layout->js_footer_files = array( 
		); 

		$this->layout->content = View::make('frontend.mediasingle');
	} 


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$entry = Media::getEntries($id, null, null);

		$this->layout->description = 'Predajte upit za stomatološku uslugu putem dentist-finder aplikacije.';

		$this->layout->keywords = 'Dentist finder, dentist, zubari, pacijenti, pregled zuba';

		$this->layout->bodyclass = 'nav-on-header';

		$this->layout->title = 'Pogledajte objavu';
 
		$this->layout->css_files = array( 
		);

		$this->layout->js_footer_files = array( 
		); 

		$this->layout->content = View::make('backend.media.edit', array('postRoute' => 'MediaUpdate', 'entry' => $entry['entry']));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Media::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}
		 
		$update = $this->repo->update(
			Input::get('id'),
			Input::file('image')
		);

		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('MediaIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Remove the specified resource from storage.
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

			if ($hasAuthority == false) 
			{
				return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
			}

		} else {

			return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
		
		}
		// - AUTHORITY CHECK ENDS HERE - //

		if ($id == null)
		{
			return Redirect::route('MediaIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Media::getEntries($id, null, null, 'true');

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('MediaIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
  
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('MediaIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('MediaIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}



}
