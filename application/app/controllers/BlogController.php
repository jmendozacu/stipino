<?php

/*
*	BlogController
*
*	Handles backend functions
*/


class BlogController extends \BaseController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new BlogRepository;

	}

	/**
	 * Display a listing of the blog post(s).
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

		$entries = Blog::getEntries(null, null, null, null, 'true');

		
		$blogcount = DB::table('cms')->where('cms.type', '=', 'blog')->whereNull('deleted_at')->count();

		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$this->layout->title = 'Blog | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/datatables.js',
		);
		$this->layout->content = View::make('backend.blog.index', array('entries' => $entries, 'blogcount' => $blogcount));
	}


	/**
	 * Show the form for creating a new blog post(s).
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
		 
		$categoryList = array();

		$categories = Category::getBlogCategories(null, null, 'false');

		if ($categories['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('messages.msg_error_getting_clients'));
		}
		foreach ($categories['entries'] as $category)
		{
			$categoryList[$category->id] = $category->title;
		}

		$this->layout->title = 'Unos novog bloga | Stipino';

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

		$this->layout->content = View::make('backend.blog.create', array('postRoute' => 'BlogStore', 'categories' => $categoryList));
	}


	/**
	 * Store a newly created blog post(s) in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Blog::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}	

		$store = $this->repo->store(
			Input::get('title'),
			Input::get('permalink'),
			Input::get('intro'),
			Input::get('content'),
			Input::get('type'),
			Input::get('published'),
			Input::get('category'),
			Input::file('image')
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('BlogIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Display the specified blog post(s).
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


		$this->layout->title = 'Blog | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.blog.view');
	}


	/**
	 * Show the form for editing the specified blog post(s).
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

		$entry = Blog::getEntries($id, null, null, null, 'false');
		if ($entry['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$categoryList = array();

		$categories = Category::getEntries(null, null);

		if ($categories['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('messages.msg_error_getting_clients'));
		}
		foreach ($categories['entries'] as $category)
		{
			$categoryList[$category->id] = $category->title;
		}
		$this->layout->title = 'Uređivanje bloga | Stipino';

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

		$this->layout->content = View::make('backend.blog.edit', array('entry' => $entry['entry'], 'postRoute' => 'BlogUpdate', 'categories' => $categoryList));
	}


	/**
	 * Update the specified blog post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Blog::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}
		 
		$update = $this->repo->update(
			Input::get('id'),
			Input::get('title'),
			Input::get('permalink'),
			Input::get('intro'),
			Input::get('content'),
			Input::get('type'),
			Input::get('published'),
			Input::get('category'),
			Input::file('image')
		);

		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('BlogIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Remove the specified blog post(s) from storage.
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
			return Redirect::route('BlogIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Blog::getEntries($id, null, null, null, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('BlogIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('BlogIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('BlogIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}
