<?php

/*
*	FrontendController
*
*	Handles frontend functions
*/

class FrontendController extends \CoreController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new FrontendRepository;
	}

	/**
	 * Display home page.
	 *	 * @return Response
	 */
	public function index()
	{
		 

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

		// Getting all cities
		$citylist = array();

	 	$city = City::getEntries(null, null);

	 	if ($city['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}

		$categories = Category::getEntries(null, null);

		$featuredproducts = Products::getEntries(null, null, null, 'false');

		$latestblogposts = Blog::getEntriesReversed(null, null, null, 3);

		$latestworkshops = Workshop::getEntries(null, null, 3, 'false');

		$blitzposts = BlitzPost::getPublishedEntries(null);
       


		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Naslovna | Stipino';

		$this->layout->css_files = array(
		   

		);

		$this->layout->js_footer_files = array(
			
		);

		$this->layout->content = View::make('frontend.homepage', array(  'citylist' => $citylist, 'regionslist' => $regionslist,  'categories' => $categories['entries'], 'featuredproducts' => $featuredproducts, 'latestblogposts' => $latestblogposts, 'latestworkshops' => $latestworkshops, 'blitzposts' => $blitzposts['entries']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


	public function about()
	{
		
		$page = Pages::getEntryByPermalink('o-nama');

		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'O nama | Stipino';

		$this->layout->css_files = array(
			 
		);

		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.page', array('page' => $page['entry']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */



	public function accommodation()
	{
		
		$page = Pages::getEntryByPermalink('smjestaj');

		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Smještaj | Stipino';

		$this->layout->css_files = array(
			 
		);

		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.page', array('page' => $page['entry']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


		public function listblog()
	{
		 

		$blogpost = Blog::getEntries(null, null, null, null, 'true');
		$blogcategories = Category::getBlogCategories(null, 11, 'false');
		
       
     
		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Blog | Stipino';

		$this->layout->css_files = array(
			 
		);

		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.blog.list', array('blogpost' => $blogpost['entries'], 'blogcategories' => $blogcategories['entries']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function sendEmail(){

    
    
      Input::merge(array_map('trim', Input::all()));

        
        Mail::send('emails.client_send_message', array('client_message' => Input::get('client_message'), 'contact_email' => Input::get('contact_email') ), function($message)
        {
          $message->from('nikola.papratovic@gmail.com', 'Stipino.com');
          $message->subject('Nova poruka od Stipino.com!');
          $message->to(Input::get('client_email'));
        });

            $interaction = new Interactions;
			$interaction->user_id = Input::get('id');
			$interaction->message = Input::get('client_message');
			$interaction->type = 'Poruka';
			$interaction->save();
     
       
      return Redirect::back()->with('success_message', Lang::get('messages.email_sent_success'));
   
}



		public function listblogbycategory($category)
	{
		 
        
		$blogpost = Blog::getEntries(null, null, null, $category, 'true');
        $blogcategories = Category::getBlogCategories(null, 11, 'false');
    

		
     
		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Blog | Stipino';

		$this->layout->css_files = array(
			 
		);

		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.blog.list', array('blogpost' => $blogpost['entry'], 'blogcategories' => $blogcategories['entries']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

		public function showblog($permalink)
	{
		 
		 $entry = Blog::getEntries(null, $permalink, null, null, null, 'false');


		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = $entry['entry']->title . ' | Stipino';

		$this->layout->css_files = array(
			 
		);

		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.blog.show', array('entry' => $entry['entry']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

		public function contact()
	{
		 
		 $page = Pages::getEntries('3', null);


		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Kontakt | Stipino';

		$this->layout->css_files = array(
			'css/frontend/font-awesome.min.css'
			 
		);

		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.contact', array('page' => $page['entry']));
	}

		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


		public function postContact()
	{

		
		Input::merge(array_map('trim', Input::all()));

		
		 Mail::send('emails.contact_send_message', array('contact_message' => Input::get('contact_message'), 'email' => Input::get('email'), 'phone' => Input::get('phone'), 'full_name' => Input::get('full_name') ), function($message)
        {
          $message->from(Input::get('email'), 'Stipino.com');
          $message->subject('Nova poruka od ' . Input::get('full_name'));
          $message->to('nikola.papratovic@gmail.com');
        });

		
		return Redirect::back()->with('success_message', Lang::get('messages.contact_message_success'));
		

		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


	public function postWorkshopEntry()
	{
		
		Input::merge(array_map('trim', Input::all()));
        
		$storeworkshopentry = $this->repo->storeworkshopentry(
			Input::get('workshop_id'),
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('address'),
			Input::get('zip')
		);

		

		if ($storeworkshopentry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('messages.error_creating_new_user'))->withInput();
		}else{
			
			return Redirect::back()->with('success_message', Lang::get('messages.workshop_entry_success'));
		}
		

		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


	public function register()
	{



        $workshops = Workshop::getEntries(null,null,2,'false');

        $cityentry = City::getEntries(null, null);
        
        $citylist = array();

        foreach ($cityentry['entries'] as $city) {
        	$citylist[$city->id] = $city->name;
        }



		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Registracija | Stipino';

		$this->layout->css_files = array(
			'css/frontend/font-awesome.min.css'
			 
		);

		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.register', array('workshops' => $workshops['entries'], 'citylist' => $citylist));
	}

	public function product($permalink)
	{
		 
		$entry = Products::getEntries(null, $permalink, null, 'false');

		$relatedposts = ProductPosts::getPostsByProduct($entry['entry']->id);
		
		$cartlist = Cart::content();
       
 
		if($entry['entry']->published == '0')
		{
			return Redirect::route('productslist');
		}

		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = $entry['entry']->title . ' | Stipino';

		$this->layout->css_files = array(
			'css/frontend/font-awesome.min.css'

			 
		);

		$this->layout->js_footer_files = array(
			  
		);

       
		$this->layout->content = View::make('frontend.products.show', array('entry' => $entry['entry'], 'relatedposts' => $relatedposts,'cartlist' => $cartlist));
	}





	public function productslist()
	{
		$entries = Products::getEntriesPublished(null, null, true);
 

		$productcategories = Category::getProductCategories(null, null); 

		$this->layout->description = 'Proizvodi Stipino';

		$this->layout->keywords = 'Proizvodi, stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Proizvodi | Stipino';

		$pagetitle = 'Svi proizvodi';

		$this->layout->css_files = array(
			'css/frontend/font-awesome.min.css'
			 
		);

		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.products.list', array('entries' => $entries['entries'], 'productcategories' => $productcategories['entries'], 'pagetitle' => $pagetitle));
	}


	public function productspercategory($category)
	{

		$category = Category::getEntries(null, $category, null); 

		$entries = ProductsCategories::getEntriesByCategory($category['entry']->id);

		$productcategories = Category::getProductCategories(null, null);  

		$this->layout->description = 'Kategorija proizvoda: ' . $category['entry']->permalink;

		$this->layout->keywords = $category['entry']->permalink . ', stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Kategorija proizvoda: ' . $category['entry']->permalink . ' | Stipino';

		$pagetitle = 'Kategorija proizvoda: ' . $category['entry']->permalink;

		$this->layout->css_files = array(
			'css/frontend/font-awesome.min.css'
			 
		);


		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.products.list', array('entries' => $entries['entries'], 'productcategories' => $productcategories['entries'], 'pagetitle' => $pagetitle));
	}

	public function workshop()
	{
     	
     	$entries = DB::table('cms')->where('cms.type', 'workshop')->orderBy('created_at', 'desc')->get();
         
     

		 // Getting all product_weight
		$workshopslist = array();

		$currentworkshops = Workshop::getEntries(null, null, null, 'false');


		if ($currentworkshops['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($currentworkshops['entries'] as $currentworkshops)
		{
			$workshopslist[$currentworkshops->id] = $currentworkshops->title . ' ' . $currentworkshops->workshop_date;
		}


		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Radionice | Stipino';

		$this->layout->css_files = array(
			'css/frontend/font-awesome.min.css'
			 
		);


		$this->layout->js_footer_files = array(
			 
		);

        
		$this->layout->content = View::make('frontend.workshop', array('entries' => $entries, 'workshopslist' => $workshopslist));

	}


	public function cart()
	{


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



		$id = Auth::id();
		$entry;
		if(empty($id)){
			$entry = '';
		}else{
			$entry = DB::table('users')->where('id', $id)->first();
			
		}


		

		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Košarica | Stipino';

		$this->layout->css_files = array(
			 
		);

		$this->layout->js_footer_files = array(
			
		);

		$this->layout->content = View::make('frontend.cart.cart', array('arealist' => $arealist, 'citieslist' => $citieslist, 'entry' => $entry));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


	public function addToCart($id)
	{
		$quantity = $_GET['quantity'];
		$packaging = $_GET['packaging'];
		$update = $_GET['update'];

	
	 	$entry = Products::getEntries($id, null, null, 'false');

	 	if($update == 'true'){
	 		$rowid = $_GET['rowid'];
	 		Cart::update($rowid, array('qty' => $quantity));
	 	}else{
	 		Cart::add(array('id' => $id, 'name' => $entry['entry']->title, 'qty' => $quantity, 'price' => $entry['entry']->price, 'options' => array('image' => $entry['entry']->image, 'permalink' => $entry['entry']->permalink, 'packaging' => $packaging)));
	 	}
		
		
		$cartitems = Cart::content();

		$total_count = 0;

		foreach($cartitems as $item){
			$total_count = $item->qty + $total_count;
		}

		 

         return Response::json(['success'=>true, 'total_count' => $total_count]);
         
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */



	public function getCartItems()
	{
		
		$cartitems = Cart::content();

		$total_count = 0;

		foreach($cartitems as $item){
			$total_count = $item->qty + $total_count;
		}

		 

         return Response::json(['success'=>true, 'total_count' => $total_count]);
         
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


		public function getCartItemList()
	{
		
		$items = Cart::content();
		$cartitems = array();


		foreach ($items as $item) {
			$cartitems[] = $item;
		}

	



         return Response::json(['success'=>true, 'cartitems' => $cartitems]);
         
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */




		public function getCartPageItemList()
	{
		
		$items = Cart::content();
		$cartitems = array();


		foreach ($items as $item) {
			$cartitems[] = $item;
		}

	



         return Response::json(['success'=>true, 'cartitems' => $cartitems]);
         
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */



		public function removeFromCart($rowid)
	{
		
		Cart::remove($rowid);


         return Response::json(['success'=>true]);
         
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


		// Post register
	public function cartorder()
	{
        $order_id = 0;
   
      
		Input::merge(array_map('trim', Input::all()));
		$cart = Cart::total();
	
		  if(empty($cart)){
        	return Redirect::back()->with('error_message', Lang::get('messages.error_validating_products'))->withInput();
        }


		$ordervalidator = Validator::make(Input::all(), Orders::$cart_order_rules);

		if ($ordervalidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('messages.error_validating_order'))->withErrors($ordervalidator)->withInput();
		}
   
		
		$order_id = DB::table('orders')->orderBy('created_at', 'desc')->pluck('order_id');

		$order_id++;

		$address = Input::get('address');
                $additional_address = Input::get('additional_address');
		if(!empty($additional_address)){
	     $address = Input::get('additional_address');
		}
       
       

        $user_id = Auth::id();
		$storecartorder = $this->repo->storeorder(
			$user_id,
			$order_id,
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('email'),
			$address,
			Input::get('area'),
			Input::get('city'),
			'stipino',
			'virman',
			'procesuiranje',
			Input::get('totalcartprice'),
			date("Y-m-d")
		);

		if ($storecartorder['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('messages.error_creating_new_user'))->withErrors($ordervalidator)->withInput();
		}else{
			Cart::destroy();
			return Redirect::route('cartsuccess')->with('success_message', Lang::get('messages.order_success'));
		}

	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

public function cartsuccess()
	{
		
		

		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Narudžba uspješna | Stipino';

		$this->layout->css_files = array(
			 
		);

		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.cart.cartsuccess');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

public function getNewPassword()
	{
		
		

		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Nova šifra | Stipino';

		$this->layout->css_files = array(
			 
		);

		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.newpassword');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


	public function sendNewPassword()
	{


		Input::merge(array_map('trim', Input::all()));

		

		$storenewpassword = $this->repo->storenewpassword(
			Input::get('token'),
			Input::get('password')
		);

		if ($storenewpassword['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('messages.error_creating_new_user'))->withInput();
		}else{
			return Redirect::route('signin')->with('success_message', Lang::get('messages.new_password_success'));
		}

		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */




public function delivery()
	{
		
		

		$this->layout->description = 'Stipino';

		$this->layout->keywords = 'Stipino';

		$this->layout->bodyclass = 'bg-grain';

		$this->layout->title = 'Dostava | Stipino';

		$this->layout->css_files = array(
			 
		);

		$this->layout->js_footer_files = array(
			 
		);

		$this->layout->content = View::make('frontend.delivery');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	// Post register
	public function storeregistration()
	{
        

		Input::merge(array_map('trim', Input::all()));

		$userValidator = Validator::make(Input::all(), User::$register_rules);

		if ($userValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('messages.error_validating_registration'))->withErrors($userValidator)->withInput();
		}

		$storeregistration = $this->repo->storeuser(
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('email'),
			Input::get('password'),
			Input::get('address'),
			Input::get('zip'),
			Input::get('city'),
			Input::get('date_of_birth'),
			Input::get('phone')
		);

		if ($storeregistration['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('messages.error_creating_new_user'))->withErrors($userValidator)->withInput();
		}

		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{

 			return Redirect::route('getlanding')->with('success_message', Lang::get('messages.sign_in_success'));
 			
		}
		else
		{
			return Redirect::back()->with('error_message', Lang::get('messages.sign_in_error'))->withInput();
		}
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
	/**
	 * Display post job page.
	 *
	 * @return Response
	 */

 



}
