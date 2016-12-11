<?php

/*
*	BlogController
*
*	Handles backend functions
*/


class TrashController extends \BaseController {

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
	public function index($trashed)
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
		$entries;
		$contentcount;


		// Get data
		switch ($trashed) {
			case 'blogposts':

				$entries = Blog::onlyTrashed()->select(
					'cms.id AS id',
					'cms.title AS title',
					'cms.image AS image',
					'cms.deleted_at AS deleted_at')->where('cms.type', '=', 'blog')->paginate(5);
				$contentcount = Blog::onlyTrashed()->where('cms.type', '=', 'blog')->count();
			break;
			case 'categories':
				$entries = Category::onlyTrashed()->select(
					'categories.id AS id',
					'categories.title AS title',
					'categories.image AS image',
					'categories.deleted_at AS deleted_at')->where('category_type', '=', 'blog')->paginate(5);
			 	$contentcount = Category::onlyTrashed()->where('category_type', '=', 'blog')->count();
			break;
			case 'pages':
				$entries = Pages::onlyTrashed()->select(
					'cms.id AS id',
					'cms.title AS title',
					'cms.image AS image',
					'cms.deleted_at AS deleted_at')->where('cms.type', '=', 'page')->paginate(5);
				$contentcount = Pages::onlyTrashed()->where('cms.type', '=', 'page')->count();
			break;
			case 'media':
				$entries = Media::onlyTrashed()->select(
					'media.id AS id',
					'media.image AS image',
					'media.deleted_at AS deleted_at')->paginate(5);
				$contentcount =	Media::onlyTrashed()->count();
			break;
			case 'widgets':
				$entries = Widget::onlyTrashed()->select(
					'cms.id AS id',
					'cms.title AS title',
					'cms.image AS image',
					'cms.deleted_at AS deleted_at')->where('cms.type', '=', 'widget')->paginate(5);
				$contentcount = Widget::onlyTrashed()->where('cms.type', '=', 'widget')->count();
			break;
			case 'workshops':
				$entries = Workshop::onlyTrashed()->select(
					'cms.id AS id',
					'cms.title AS title',
					'cms.image AS image',
					'cms.deleted_at AS deleted_at')->where('cms.type', '=', 'workshop')->paginate(5);
				$contentcount = Workshop::onlyTrashed()->where('cms.type', '=', 'workshop')->count();
			break;
			case 'clients':
				$entries = User::onlyTrashed()->select(
					'users.id AS id',
					'users.email AS email',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.deleted_at AS deleted_at')->paginate(5);
				$contentcount = User::onlyTrashed()->where('user_group', '!=', 'admin')->count();
			break;
			case 'products':
				$entries = Products::onlyTrashed()->select(
					'products.id AS id',
					'products.title AS title',
					'products.price AS price',
					'products.deleted_at AS deleted_at')->paginate(5);
				$contentcount = Products::onlyTrashed()->count();
			break;
			case 'productsweight':
				$entries = ProductsWeight::onlyTrashed()->select(
					'product_weight.id AS id',
					'product_weight.title AS title',
					'product_weight.product_weight AS product_weight',
					'product_weight.measure_unit AS measure_unit',
					'product_weight.deleted_at AS deleted_at')->paginate(5);
				$contentcount = ProductsWeight::onlyTrashed()->count();
			break;
			case 'productscategories':
				$entries = Category::onlyTrashed()
				->select(
					'categories.id AS id',
					'categories.title AS categorytitle',
					'categories.category_type AS category_type',
					'categories.description AS description',
					'categories.deleted_at AS deleted_at'
				)
				->where('category_type', '=', 'product')->paginate(5);
				$contentcount = Category::onlyTrashed()->where('category_type', '=', 'product')->count();

			break;
			case 'orders':
				$entries = Orders::onlyTrashed()
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'orders.order_id AS order_id',
					'orders.price AS orderprice',
					'orders.deleted_at AS deleted_at',
					'users.first_name AS first_name',
					'users.last_name AS last_name'
				)->paginate(5);
				$contentcount = Orders::onlyTrashed()->count();
			break;
			default:
				
				break;
		}



		$this->layout->title = 'Smeće | Stipino';

		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
		
		);
		$this->layout->content = View::make('backend.trash.index', array('entries' => $entries, 'trashed' => $trashed, 'contentcount' => $contentcount));
	}



	/**
	 * Update the specified blog post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function restore($id, $trashed)
	{
		
		
		switch ($trashed) {
			case 'blogposts':
            Blog::withTrashed()->where('id', $id)->restore();
            return Redirect::route('BlogIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'categories':
		    Category::withTrashed()->where('id', $id)->restore();
            return Redirect::route('CategoryIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'pages':
			 Pages::withTrashed()->where('id', $id)->restore();
            return Redirect::route('PagesIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'media':
			 Media::withTrashed()->where('id', $id)->restore();
            return Redirect::route('MediaIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));	
			break;
			case 'widgets':
			 Widget::withTrashed()->where('id', $id)->restore();
            return Redirect::route('WidgetIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));	
			break;
			case 'workshops':
			 Workshop::withTrashed()->where('id', $id)->restore();
            return Redirect::route('WorkshopIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'clients':
			 User::withTrashed()->where('id', $id)->restore();
            return Redirect::route('ClientsIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'products':
			Products::withTrashed()->where('id', $id)->restore();
            return Redirect::route('ProductsIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));	
			break;
			case 'productsweight':
			ProductsWeight::withTrashed()->where('id', $id)->restore();
            return Redirect::route('ProductsWeightIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));
			break;
			case 'productscategories':
			Category::withTrashed()->where('id', $id)->restore();
            return Redirect::route('ProductCategoryIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));	
			break;
			case 'orders':
			Orders::withTrashed()->where('id', $id)->restore();
            return Redirect::route('OrdersIndex')->with('success_message', Lang::get('core.msg_success_entry_restored'));	
			break;
			default:
				
				break;
		}
	}


	
}
