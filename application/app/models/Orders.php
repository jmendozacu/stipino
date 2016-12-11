<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;


class Orders extends Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	protected $table = 'orders';

	// New entry validation
	public static $store_rules = array( 
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer' 
	);

	public static $cart_order_rules = array(
		'first_name'					=>	'required',
		'last_name'					=>	'required',
		'email'					=>	'required|email',
		'address'					=>	'required',
		'area'					=>	'required|integer',
		'city'					=>	'required|integer'
	);

  
	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntries($id = null, $paginate)
	{
	 	try 
		{  
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'orders.order_id AS order_id',
					'orders.price AS orderprice',
					'orders.shipping_way AS shipping_way',
					'orders.payment_way AS payment_way',
					'orders.payment_status AS payment_status',
					'orders.shipping_address AS shipping_address',
					'orders.billing_address AS billing_address',
					'orders.note AS note',
					'orders.order_date AS order_date',
					'users.id AS user_id',
					'users.first_name AS first_name',
					'users.last_name AS last_name'
				)->whereNull('orders.deleted_at');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('orders.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}
 
			// Default return
			$entries = $entry;
            if ($paginate == 'true')
				// Return all entries
				$entries = $entries->paginate(10);
				else
				{
				$entries = $entries->get();
				}
 
			
			return array('status' => 1, 'entries' => $entries);
	 	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}    
	} 

	public static function getLastBill()
	{
	 	try 
		{  
			$entry = DB::table('orders')
				->select(
					'orders.order_id AS order_id'
				);
 
			// Default return

 
			$entry = $entry->orderBy('created_at', 'desc')->first();
			
 

			return array('status' => 1, 'entry' => $entry);
	 	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}    
	} 


	 public static function getPaginateEntries()
	{
		try
		{
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'orders.order_id AS order_id',
					'orders.price AS orderprice',
					'orders.shipping_way AS shipping_way',
					'orders.payment_way AS payment_way',
					'orders.payment_status AS payment_status',
					'orders.shipping_address AS shipping_address',
					'orders.note AS note',
					'orders.order_date AS order_date',
					'users.id AS user_id',
					'users.first_name AS first_name',
					'users.last_name AS last_name'
				)->whereNull('orders.deleted_at');

				
	 	
				// Default return
				$entries = $entry;

			
				// Return all entries
				$entries = $entries->paginate(10);
			

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


	public static function getSalesPaginateEntries()
	{
		try
		{
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'orders.order_id AS order_id',
					'orders.price AS orderprice',
					'orders.shipping_way AS shipping_way',
					'orders.payment_way AS payment_way',
					'orders.payment_status AS payment_status',
					'orders.shipping_address AS shipping_address',
					'orders.note AS note',
					'orders.order_date AS order_date',
					'users.id AS user_id',
					'users.first_name AS first_name',
					'users.last_name AS last_name'
				)->whereNull('orders.deleted_at')
				->where('orders.payment_status', 'zavrseno');

				
	 	
				// Default return
				$entries = $entry;

			
				// Return all entries
				$entries = $entries->paginate(10);
			

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


	public static function getSaleClientList()
	{
		
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'users.id AS user_id',
					'users.first_name AS first_name',
					'users.last_name AS last_name'
				)->whereNull('orders.deleted_at')
				->where('orders.payment_status', 'zavrseno')->get();

			return $entry;
	}
	

	public static function getSaleEmailList()
	{
		
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'users.id AS user_id',
					'users.email AS email'
				)->whereNull('orders.deleted_at')
				->where('email','!=','')
				->where('orders.payment_status', 'zavrseno')->get();

			return $entry;
	}	

	public static function getSaleAddressList()
	{
		
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'users.address AS address'
				)->whereNull('orders.deleted_at')
				->where('address','!=','')
				->where('orders.payment_status', 'zavrseno')->get();

			return $entry;
	}


	public static function getSaleCityList()
	{
		
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->join('city', 'city.id', '=', 'users.city')
				->select(
					'orders.id AS id',
					'city.id AS city_id',
					'city.name AS city_name'
				)->whereNull('orders.deleted_at')
				->where('users.city','!=','0')
				->where('orders.payment_status', 'zavrseno')->get();

			return $entry;
	}	

	public static function getSaleRegionList()
	{
		
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->join('region', 'region.id', '=', 'users.region')
				->select(
					'orders.id AS id',
					'region.id AS region_id',
					'region.name AS region_name'
				)->whereNull('orders.deleted_at')
				->where('users.region','!=','0')
				->where('orders.payment_status', 'zavrseno')->get();

			return $entry;
	}	
		
	




	public static function getFilter1SalesPaginateEntries($search_filter, $search_input)
	{
		try
		{
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'orders.order_id AS order_id',
					'orders.price AS orderprice',
					'orders.shipping_way AS shipping_way',
					'orders.payment_way AS payment_way',
					'orders.payment_status AS payment_status',
					'orders.shipping_address AS shipping_address',
					'orders.note AS note',
					'orders.order_date AS order_date',
					'users.id AS user_id',
					'users.first_name AS first_name',
					'users.last_name AS last_name'
				)->whereNull('orders.deleted_at')
				->where('orders.payment_status', 'zavrseno')
				->where('users.' . $search_filter, $search_input);

				
	 	
				// Default return
				$entries = $entry;

			
				// Return all entries
				$entries = $entries->paginate(10);
			

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

	public static function getFilter2SalesPaginateEntries($search_filter, $search_input)
	{
		try
		{
			$entry = DB::table('orders')
				->join('users', 'users.id', '=', 'orders.user_id')
				->select(
					'orders.id AS id',
					'orders.order_id AS order_id',
					'orders.price AS orderprice',
					'orders.shipping_way AS shipping_way',
					'orders.payment_way AS payment_way',
					'orders.payment_status AS payment_status',
					'orders.shipping_address AS shipping_address',
					'orders.note AS note',
					'orders.order_date AS order_date',
					'users.id AS user_id',
					'users.first_name AS first_name',
					'users.last_name AS last_name'
				)->whereNull('orders.deleted_at')
				->where('orders.payment_status', 'zavrseno')
				->where('orders.' . $search_filter, $search_input);

				
	 	
				// Default return
				$entries = $entry;

			
				// Return all entries
				$entries = $entries->paginate(10);
			

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}