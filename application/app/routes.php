<?php
/*
 *
 */

header("Access-Control-Allow-Origin: *");

// Test route
Route::get('test', array('as' => 'getTest', 'uses' => 'CoreController@getTest'));


   Route::get('/updateapp', function()
{
\Artisan::call('dump-autoload');
echo 'dump-autoload complete';
});



// Sign in / Sign out / Register / Post register page

Route::get('sign-in', array('before' => 'guest', 'as' => 'signin', 'uses' => 'CoreController@signin'));

// Sign in processing --- 'before' => 'guest|csrf',
Route::post('sign-in', array('before' => 'guest', 'as' => 'login', 'uses' => 'CoreController@login'));

// Sign out
Route::get('sign-out', array('before' => 'auth', 'as' => 'signout', 'uses' => 'CoreController@signout'));

// Register page
Route::get('registracija', array('before' => 'guest', 'as' => 'getRegister', 'uses' => 'FrontendController@register'));

// Post register page
Route::post('registracija-korisnika', array('before' => 'csrf', 'as' => 'postRegister', 'uses' => 'FrontendController@storeregistration'));
//Post Order new password
Route::post('send-new-password', array('before' => 'guest', 'as' => 'sendNewPassword', 'uses' => 'FrontendController@sendNewPassword'));

//Post Order new password
Route::get('new-password', array('before' => 'guest', 'as' => 'getNewPassword', 'uses' => 'FrontendController@getNewPassword'));

//Post email sent
Route::post('slanje-poruke', array('before' => 'csrf', 'as' => 'postMail', 'uses' => 'FrontendController@sendEmail'));

// Forgot password page
Route::get('zaboravljena-lozinka', array('as' => 'forgotPassword', 'uses' => 'RemindersController@getRemind'));

// Forgot password processing
Route::post('refresh-password', array('before' => 'csrf', 'as' => 'postRemind', 'uses' => 'RemindersController@postRemind'));

// Reset password page
Route::get('reset-password/{token}', array('as' => 'getResetPassword', 'uses' => 'RemindersController@getReset'));;

// Post reset password
Route::post('new-password', array('before' => 'csrf', 'as' => 'postReset', 'uses' => 'RemindersController@postReset'));

// Post contact
Route::post('kontaktiranje', array('before' => 'csrf', 'as' => 'postContact', 'uses' => 'FrontendController@postContact'));

// Post workshop entry
Route::post('prijava-radionice', array('before' => 'csrf', 'as' => 'postWorkshopEntry', 'uses' => 'FrontendController@postWorkshopEntry'));






/*
* Frontend routes
*/

// Home / landing
Route::get('/', array('as' => 'getlanding', 'uses' => 'FrontendController@index'));

Route::get('o-nama', array('as' => 'aboutUs', 'uses' => 'FrontendController@about'));

Route::get('smjestaj', array('as' => 'accommodation', 'uses' => 'FrontendController@accommodation'));

Route::get('objave', array('as' => 'frontBlog', 'uses' => 'FrontendController@listblog'));

Route::get('objave/{permalink}', array('as' => 'blogPost', 'uses' => 'FrontendController@showblog'));

Route::get('objave/kategorija/{category}', array('as' => 'blogPostsByCategory', 'uses' => 'FrontendController@listblogbycategory'));

Route::get('kontakt', array('as' => 'contact', 'uses' => 'FrontendController@contact'));

Route::get('proizvod/{permalink}', array('as' => 'product', 'uses' => 'FrontendController@product'));

Route::get('proizvodi', array('as' => 'productslist', 'uses' => 'FrontendController@productslist'));

Route::get('proizvodi/{category}', array('as' => 'productspercategory', 'uses' => 'FrontendController@productspercategory'));

Route::get('radionice', array('as' => 'workshop', 'uses' => 'FrontendController@workshop'));

Route::get('dostava', array('as' => 'delivery', 'uses' => 'FrontendController@delivery'));



Route::group(array('prefix' => 'kosarica'), function()
{

	Route::get('/', array('as' => 'cart', 'uses' => 'FrontendController@cart'));

    Route::get('/uspjesno/', array('as' => 'cartsuccess', 'uses' => 'FrontendController@cartsuccess'));

    Route::post('/narucivanje/', array('as' => 'cartorder', 'uses' => 'FrontendController@cartorder'));

});



Route::group(array('prefix' => 'ajax'), function()
{

	Route::get('/addToCart/{id}', 'FrontendController@addToCart');

	Route::get('/getCartItems/', 'FrontendController@getCartItems');

	Route::get('/getCartItemList/', 'FrontendController@getCartItemList');

	Route::get('/getCartPageItemList/', 'FrontendController@getCartPageItemList');

	Route::get('/removeFromCart/{rowid}', 'FrontendController@removeFromCart');

});

 /*
 * 	Backend routes
 */
Route::group(array('before' => 'auth', 'prefix' => 'admin'), function()
{

	
	/*
	 *	Dashboard
	 *
	 *	- available only to logged in users
	 *	- Controller handles the type and file loading depending on user role
	 */

	Route::get('/', array('as' => 'getDashboard', 'uses' => 'DashboardController@index'));

	// Category accounts, create, save, edit, update, destroy
 
		Route::group(array('prefix' => 'products'), function()
		{
			Route::get('/', array('as' => 'ProductsIndex', 'uses' => 'ProductsController@index'));

			Route::get('create', array('as' => 'ProductsCreate', 'uses' => 'ProductsController@create'));

			Route::post('store', array('as' => 'ProductsStore', 'uses' => 'ProductsController@store'));

			Route::get('edit/{id}', array('as' => 'ProductsEdit', 'uses' => 'ProductsController@edit'));

			Route::post('update/{id}', array('as' => 'ProductsUpdate', 'uses' => 'ProductsController@update'));

			Route::get('destroy/{id}', array('as' => 'ProductsDestroy', 'uses' => 'ProductsController@destroy'));

		});

		Route::group(array('prefix' => 'ajax'), function()
		{

			Route::get('/getAddress/{id}', 'ClientInfoController@getAddress');

			Route::get('/getCity/{areaid}', 'ClientInfoController@getCity'); 

		});


		Route::group(array('prefix' => 'productcategory'), function()
		{
			Route::get('/', array('as' => 'ProductCategoryIndex', 'uses' => 'ProductCategoryController@index'));

			Route::get('create', array('as' => 'ProductCategoryCreate', 'uses' => 'ProductCategoryController@create'));

			Route::post('store', array('as' => 'ProductCategoryStore', 'uses' => 'ProductCategoryController@store'));

			Route::get('edit/{id}', array('as' => 'ProductCategoryEdit', 'uses' => 'ProductCategoryController@edit'));

			Route::post('update/{id}', array('as' => 'ProductCategoryUpdate', 'uses' => 'ProductCategoryController@update'));

			Route::get('destroy/{id}', array('as' => 'ProductCategoryDestroy', 'uses' => 'ProductCategoryController@destroy'));

		});

		Route::group(array('prefix' => 'productsweight'), function()
		{
			Route::get('/', array('as' => 'ProductsWeightIndex', 'uses' => 'ProductsWeightController@index'));

			Route::get('create', array('as' => 'ProductsWeightCreate', 'uses' => 'ProductsWeightController@create'));

			Route::post('store', array('as' => 'ProductsWeightStore', 'uses' => 'ProductsWeightController@store'));

			Route::get('edit/{id}', array('as' => 'ProductsWeightEdit', 'uses' => 'ProductsWeightController@edit'));

			Route::post('update/{id}', array('as' => 'ProductsWeightUpdate', 'uses' => 'ProductsWeightController@update'));

			Route::get('destroy/{id}', array('as' => 'ProductsWeightDestroy', 'uses' => 'ProductsWeightController@destroy'));

		});

		Route::group(array('prefix' => 'clients'), function()
		{
			Route::get('/', array('as' => 'ClientsIndex', 'uses' => 'ClientsController@index'));

			Route::get('create', array('as' => 'ClientsCreate', 'uses' => 'ClientsController@create'));

			Route::post('store', array('as' => 'ClientsStore', 'uses' => 'ClientsController@store'));

			Route::post('storefromorder', array('as' => 'ClientsStoreFromOrder', 'uses' => 'ClientsController@storefromorder'));

			Route::get('edit/{id}', array('as' => 'ClientsEdit', 'uses' => 'ClientsController@edit'));

			Route::post('update/{id}', array('as' => 'ClientsUpdate', 'uses' => 'ClientsController@update'));

			Route::get('destroy/{id}', array('as' => 'ClientsDestroy', 'uses' => 'ClientsController@destroy'));

		});

		Route::group(array('prefix' => 'orders'), function()
		{
			Route::get('/', array('as' => 'OrdersIndex', 'uses' => 'OrdersController@index'));

			Route::get('create', array('as' => 'OrdersCreate', 'uses' => 'OrdersController@create'));

			Route::get('createfromclient', array('as' => 'OrdersCreateFromClient', 'uses' => 'OrdersController@createfromclient'));

			Route::post('store', array('as' => 'OrdersStore', 'uses' => 'OrdersController@store'));

			Route::get('edit/{id}', array('as' => 'OrdersEdit', 'uses' => 'OrdersController@edit'));

			Route::post('update/{id}', array('as' => 'OrdersUpdate', 'uses' => 'OrdersController@update'));

			Route::get('destroy/{id}', array('as' => 'OrdersDestroy', 'uses' => 'OrdersController@destroy'));

			Route::group(array('prefix' => 'sales'), function()
		{
			Route::get('/', array('as' => 'SalesIndex', 'uses' => 'SalesController@index'));

			Route::get('create', array('as' => 'SalesCreate', 'uses' => 'SalesController@create'));

			Route::post('store', array('as' => 'SalesStore', 'uses' => 'SalesController@store'));

			Route::get('edit/{id}', array('as' => 'SalesEdit', 'uses' => 'SalesController@edit'));

			Route::post('update/{id}', array('as' => 'SalesUpdate', 'uses' => 'SalesController@update'));

			Route::get('destroy/{id}', array('as' => 'SalesDestroy', 'uses' => 'SalesController@destroy'));

			Route::get('filter/{input}', array('as' => 'SalesSearch', 'uses' => 'SalesController@search'));

			Route::get('getdropdownlist/{search_filter}', array('as' => 'GetDropdownList', 'uses' => 'SalesController@getDropdownList'));

		});

	});

	// Blog posts, create, save, edit, update, destroy
	Route::group(array('prefix' => 'blog'), function()
	{
		Route::get('/', array('as' => 'BlogIndex', 'uses' => 'BlogController@index'));

		Route::get('create', array('as' => 'BlogCreate', 'uses' => 'BlogController@create'));

		Route::post('store', array('as' => 'BlogStore', 'uses' => 'BlogController@store'));

		Route::get('edit/{id}', array('as' => 'BlogEdit', 'uses' => 'BlogController@edit'));

		Route::post('update/{id}', array('as' => 'BlogUpdate', 'uses' => 'BlogController@update'));

		Route::get('destroy/{id}', array('as' => 'BlogDestroy', 'uses' => 'BlogController@destroy'));

		Route::group(array('prefix' => 'category'), function()
		{
			Route::get('/', array('as' => 'CategoryIndex', 'uses' => 'CategoryController@index'));

			Route::get('create', array('as' => 'CategoryCreate', 'uses' => 'CategoryController@create'));

			Route::post('store', array('as' => 'CategoryStore', 'uses' => 'CategoryController@store'));

			Route::get('edit/{id}', array('as' => 'CategoryEdit', 'uses' => 'CategoryController@edit'));

			Route::post('update/{id}', array('as' => 'CategoryUpdate', 'uses' => 'CategoryController@update'));

			Route::get('destroy/{id}', array('as' => 'CategoryDestroy', 'uses' => 'CategoryController@destroy'));

		});

	});

// Blog posts, create, save, edit, update, destroy
	Route::group(array('prefix' => 'blitzpost'), function()
	{
		Route::get('/', array('as' => 'BlitzPostIndex', 'uses' => 'BlitzPostController@index'));

		Route::get('create', array('as' => 'BlitzPostCreate', 'uses' => 'BlitzPostController@create'));

		Route::post('store', array('as' => 'BlitzPostStore', 'uses' => 'BlitzPostController@store'));

		Route::get('edit/{id}', array('as' => 'BlitzPostEdit', 'uses' => 'BlitzPostController@edit'));

		Route::post('update/{id}', array('as' => 'BlitzPostUpdate', 'uses' => 'BlitzPostController@update'));

		Route::get('destroy/{id}', array('as' => 'BlitzPostDestroy', 'uses' => 'BlitzPostController@destroy'));

	
	});

	// Pages, create, save, edit, update, destroy
	Route::group(array('prefix' => 'pages'), function()
	{
		Route::get('/', array('as' => 'PagesIndex', 'uses' => 'PagesController@index'));

		Route::get('create', array('as' => 'PagesCreate', 'uses' => 'PagesController@create'));

		Route::post('store', array('as' => 'PagesStore', 'uses' => 'PagesController@store'));

		Route::get('edit/{id}', array('as' => 'PagesEdit', 'uses' => 'PagesController@edit'));

		Route::post('update/{id}', array('as' => 'PagesUpdate', 'uses' => 'PagesController@update'));

		Route::get('destroy/{id}', array('as' => 'PagesDestroy', 'uses' => 'PagesController@destroy'));

	});

		Route::group(array('prefix' => 'media'), function()
	{
		Route::get('/', array('as' => 'MediaIndex', 'uses' => 'MediaController@index'));

		Route::get('create', array('as' => 'MediaCreate', 'uses' => 'MediaController@create'));

		Route::post('store', array('as' => 'MediaStore', 'uses' => 'MediaController@store'));

		Route::get('edit/{id}', array('as' => 'MediaEdit', 'uses' => 'MediaController@edit'));

		Route::post('update/{id}', array('as' => 'MediaUpdate', 'uses' => 'MediaController@update'));

		Route::get('destroy/{id}', array('as' => 'MediaDestroy', 'uses' => 'MediaController@destroy'));

	});

		Route::group(array('prefix' => 'widget'), function()
	{
		Route::get('/', array('as' => 'WidgetIndex', 'uses' => 'WidgetController@index'));

		Route::get('create', array('as' => 'WidgetCreate', 'uses' => 'WidgetController@create'));

		Route::post('store', array('as' => 'WidgetStore', 'uses' => 'WidgetController@store'));

		Route::get('edit/{id}', array('as' => 'WidgetEdit', 'uses' => 'WidgetController@edit'));

		Route::post('update/{id}', array('as' => 'WidgetUpdate', 'uses' => 'WidgetController@update'));

		Route::get('destroy/{id}', array('as' => 'WidgetDestroy', 'uses' => 'WidgetController@destroy'));

	});

	Route::group(array('prefix' => 'workshop'), function()
	{
		Route::get('/', array('as' => 'WorkshopIndex', 'uses' => 'WorkshopController@index'));

		Route::get('create', array('as' => 'WorkshopCreate', 'uses' => 'WorkshopController@create'));

		Route::post('store', array('as' => 'WorkshopStore', 'uses' => 'WorkshopController@store'));

		Route::get('edit/{id}', array('as' => 'WorkshopEdit', 'uses' => 'WorkshopController@edit'));

		Route::post('update/{id}', array('as' => 'WorkshopUpdate', 'uses' => 'WorkshopController@update'));

		Route::get('destroy/{id}', array('as' => 'WorkshopDestroy', 'uses' => 'WorkshopController@destroy'));

	});

});


// Restore trash (Blog, pages, media, widgets, workshops, clients, products)
	Route::group(array('prefix' => 'trash'), function()
	{
		Route::get('/{trashed}', array('as' => 'TrashIndex', 'uses' => 'TrashController@index'));

		Route::get('restore/{id}/{trashed}', array('as' => 'TrashRestore', 'uses' => 'TrashController@restore'));

	});