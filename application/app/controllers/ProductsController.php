<?php

/*
*	ProductsController
*
*	Handles backend functions
*/


class ProductsController extends \BaseController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new ProductsRepository;

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

		$entries = Products::getEntries(null, null, null, 'true');
 		$productscount = DB::table('products')->whereNull('deleted_at')->count();

		if ($entries['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$this->layout->title = 'Proizvodi | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/datatables.js'
		);
		$this->layout->content = View::make('backend.products.index', array('entries' => $entries['entries'], 'productscount' => $productscount));
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

		 // Getting all product_weight
		$productsweightlist = array();

		$productweight = ProductsWeight::getEntries();

		if ($productweight['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($productweight['entries'] as $productweight)
		{
			$productsweightlist[$productweight->id] = $productweight->title . '  (' . $productweight->product_weight . $productweight->measure_unit . ')';
		}
		 
		$categorylist = array();

	 	$categories = Category::getProductCategories(null, null);

	 	if ($categories['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($categories['entries'] as $categories)
		{
			$categorylist[$categories->id] = $categories->title;
		}
		
		$blogpost = Blog::getEntries(null, null, null, null, null);

		$bloglist = array();

	 	$blogs = Blog::getEntries(null, null, null, null, null);

	 	if ($blogs['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($blogs['entries'] as $blogs)
		{
			$bloglist[$blogs->id] = $blogs->title;
		}
		 
		$this->layout->title = 'Unos novog proizvoda | Stipino';

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

		$this->layout->content = View::make('backend.products.create', array('postRoute' => 'ProductsStore', 'productsweightlist' => $productsweightlist, 'categorylist' => $categorylist, 'blogpost' => $blogpost, 'bloglist' => $bloglist));
	}


	/**
	 * Store a newly created client post(s) in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::except('product_category', 'blogposts')));
		
		$entryValidator = Validator::make(Input::all(), Products::$store_rules);

		//$priceValidator = Validator::make(Input::all(), Products::$check_sale_price(Input::get('price')));

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}	

		$store = $this->repo->store(
			Input::get('title'),
			Input::get('permalink'),
			Input::get('product_weight'),
			Input::get('intro'),
			Input::get('description'),
			Input::get('price'),
			Input::get('sale_price'),
			Input::get('manufacturing_price'),
			Input::get('onsale'),
			Input::get('onstock'),
			Input::get('published'),
			Input::get('product_category'),
			Input::get('blogposts'),
			Input::file('image'),
			Input::file('cover_image')
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('ProductsIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
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


		$this->layout->title = 'Proizvodi | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js'
		);

		$this->layout->content = View::make('backend.products.view');
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
       	$blogslist = array();
        $blogids = array();

	 	$blog = Blog::getEntries(null, null,null,null,null);
        $productposts = ProductPosts::getPostsByProduct($id);
        

	 	if ($blog['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($productposts['productposts'] as $blogs)
		{
			$blogids[] = $blogs->blog_id;
		}
        
        array_push($blogslist, $blog, $blogids);


		$entry = Products::getEntries($id, null, null, 'false');

		
       

		$productcategories = ProductCategory::getCategoriesByProduct($id);

		
		 // Getting all product_weight
		$productsweightlist = array();

		$productweight = ProductsWeight::getEntries();

		if ($productweight['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($productweight['entries'] as $productweight)
		{
			$productsweightlist[$productweight->id] = $productweight->title . '  (' . $productweight->product_weight . $productweight->measure_unit . ')';
		}
         
        
	 	$categories = Category::getProductCategories(null, null);
	 	$categorylist = array();
	 	$categoryids = array();

	 	if ($categories['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
        

        foreach($productcategories['productcategories'] as $productids){
         $categoryids[] = $productids->category_id;
        }
       
			
		array_push($categorylist, $categories, $categoryids);
  		
      
        

		if ($entry['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$this->layout->title = 'Uređivanje proizvoda | Stipino';

		$this->layout->css_files = array(
			'css/backend/froala_editor.css',
			'css/backend/froala_editor.min.css',
			'css/backend/froala_editor.pkgd.css',
			'css/backend/froala_editor.pkgd.min.css',
			'css/backend/froala_style.css',
			'css/backend/froala_style.min.css',
			'css/backend/select2.css'

			);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			
			'js/backend/froala_editor.min.js',
			'js/backend/froala_editor.pkgd.min.js',

			'js/backend/select2.full.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'

		);
          
	
       
		$this->layout->content = View::make('backend.products.edit', array('entry' => $entry, 'postRoute' => 'ProductsUpdate', 'productsweightlist' => $productsweightlist, 'categorylist' => $categorylist, 'blogslist' => $blogslist));
	}


	/**
	 * Update the specified client post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::except('product_category', 'product_posts')));

		$entryValidator = Validator::make(Input::all(), Products::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}
		 
		$update = $this->repo->update(
			Input::get('id'),
			Input::get('title'),
			Input::get('permalink'),
			Input::get('product_weight'),
			Input::get('intro'),
			Input::get('description'),
			Input::get('price'),
			Input::get('sale_price'),
			Input::get('manufacturing_price'),
			Input::get('onsale'),
			Input::get('onstock'),
			Input::get('published'),
			Input::get('product_category'),
			Input::get('product_posts'),
			Input::file('image'),
			Input::file('cover_image')
		);

		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('ProductsIndex')->with('success_message', Lang::get('core.msg_success_entry_edited', array('name' => Input::get('name'))));
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
			return Redirect::route('ProductsIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Products::getEntries($id, null, null, 'true');

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('ProductsIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::route('ProductsIndex')->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::route('ProductsIndex')->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}
