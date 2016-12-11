<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Products extends Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];


	protected $table = 'products';

	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
		'description'			=>	'required'
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer',
 		'title'					=>	'required',
		'description'			=>	'required'
	);

	/*// Sale price check; can't put bigger value for sale price
	public static $check_sale_price($price) = array(
		'sale_price'			=>	'between:0,' . $price,
	);*/

	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntries($id = null, $permalink = null, $items = null, $paginate)
	{
	/*	try 
		{ */
			$entry = DB::table('products')
				->join('product_weight', 'product_weight.id', '=', 'products.product_weight')
				->select(
					'products.id AS id',
					'products.title AS title',
					'products.permalink AS permalink',
					'products.product_weight AS product_weight',
					'products.intro AS intro',
					'products.description AS description',
					'products.price AS price',
					'products.sale_price AS sale_price',
					'products.manufacturing_price AS manufacturing_price',
					'products.onsale AS onsale',
					'products.onstock AS onstock',
					'products.published AS published',
					'products.image AS image',
					'products.cover_image AS cover_image',
					'products.created_at AS created_at',
					'products.updated_at AS updated_at',
					'product_weight.title AS producttitle',
					'product_weight.measure_unit AS measure_unit',
					'product_weight.product_weight AS joinproduct_weight'
				)->whereNull('products.deleted_at');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			if ($permalink != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products.permalink', '=', $permalink)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
				if ($paginate == 'true')
				// Return all entries
				$entries = $entries->paginate(10);
				else
				{
					$entries = $entries->get();
				}
				
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->take($items)->get();
			}

			return array('status' => 1, 'entries' => $entries);
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   */
	} 


	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntriesPublished($id = null, $permalink = null, $paginate = null)
	{
	/*	try 
		{ */
 			$entry = DB::table('products')
				->join('product_weight', 'product_weight.id', '=', 'products.product_weight')
				->select(
					'products.id AS id',
					'products.title AS title',
					'products.permalink AS permalink',
					'products.product_weight AS product_weight',
					'products.intro AS intro',
					'products.description AS description',
					'products.price AS price',
					'products.sale_price AS sale_price',
					'products.manufacturing_price AS manufacturing_price',
					'products.onsale AS onsale',
					'products.onstock AS onstock',
					'products.published AS published',
					'products.image AS image',
					'products.cover_image AS cover_image',
					'products.created_at AS created_at',
					'products.updated_at AS updated_at',
					'product_weight.title AS producttitle',
					'product_weight.measure_unit AS measure_unit',
					'product_weight.product_weight AS joinproduct_weight'
				)->where('published', '=', '1');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			if ($permalink != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products.permalink', '=', $permalink)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

 

			if ($paginate != null)
			{
				// Return all entries
				$entries = $entries->paginate(12);
			}

			return array('status' => 1, 'entries' => $entries);
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   */
	} 


	/*
	*	Get prices
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getPrices()
	{
	/*	try 
		{ */
			$entry = DB::table('products')
				->select(
					'products.id AS id',
					'products.price AS price'
				)->get();


			// Default return
			$entries = $entry;

			return array('status' => 1, 'entries' => $entries);
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   */
	} 





}