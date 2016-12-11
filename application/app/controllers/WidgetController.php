<?php

/*
*	WidgetController
*
*	Handles backend functions
*/


class WidgetController extends \BaseController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new WidgetRepository;

	}

	/**
	 * Display a listing of the widget post(s).
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

		$entries = Widget::getEntries(null, null, null);
		$widgetcount = DB::table('cms')->where('cms.type', '=', 'widget')->whereNull('deleted_at')->count();

		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$this->layout->title = 'Widget | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/datatables.js',
		);
		$this->layout->content = View::make('backend.widget.index', array('entries' => $entries, 'widgetcount' => $widgetcount));
	}


	/**
	 * Show the form for creating a new widget post(s).
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

		$this->layout->title = 'Unos novog widgeta | Stipino';

		$this->layout->css_files = array(
			'css/backend/froala_editor.css',
			'css/backend/froala_editor.min.css',
			'css/backend/froala_editor.pkgd.css',
			'css/backend/froala_editor.pkgd.min.css',
			'css/backend/froala_style.css',
			'css/backend/froala_style.min.css'

			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			
			'js/backend/froala_editor.min.js',
			'js/backend/froala_editor.pkgd.min.js',

			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
		);

		$this->layout->content = View::make('backend.widget.create', array('postRoute' => 'WidgetStore'));
	}


	/**
	 * Store a newly created widget post(s) in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Widget::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}	

		$store = $this->repo->store(
			Input::get('title'),
			Input::get('permalink'),
			Input::get('content'),
			Input::get('type'),
			Input::get('published')
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('WidgetIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Display the specified widget post(s).
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


		$this->layout->title = 'Widget | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.widget.view');
	}


	/**
	 * Show the form for editing the specified widget post(s).
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

		$entry = Widget::getEntries($id, null, null);
		if ($entry['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Uređivanje widgeta | Stipino';

		$this->layout->css_files = array(
			'css/backend/froala_editor.css',
			'css/backend/froala_editor.min.css',
			'css/backend/froala_editor.pkgd.css',
			'css/backend/froala_editor.pkgd.min.css',
			'css/backend/froala_style.css',
			'css/backend/froala_style.min.css'

			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			
			'js/backend/froala_editor.min.js',
			'js/backend/froala_editor.pkgd.min.js',

			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
		);

		$this->layout->content = View::make('backend.widget.edit', array('entry' => $entry['entry'], 'postRoute' => 'WidgetUpdate'));
	}


	/**
	 * Update the specified widget post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Widget::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}
		 
		$update = $this->repo->update(
			Input::get('title'),
			Input::get('permalink'),
			Input::get('content'),
			Input::get('type'),
			Input::get('published')
		);

		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('WidgetIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Remove the specified widget post(s) from storage.
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
			return Redirect::route('WidgetIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Widget::getEntries($id, null, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('WidgetIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('WidgetIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('WidgetIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}
