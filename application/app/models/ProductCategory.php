<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductCategory extends Eloquent
{


    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];


	protected $table = 'products_categories';

	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer',
	);	

	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntries($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('products_categories')
				->select(
					'products_categories.id AS id',
					'products_categories.title AS title',
					'products_categories.permalink AS permalink',
					'products_categories.description AS description'
				)->whereNull('deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('products_categories.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
				$entries = $entries->get();
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->take($items)->get();
			}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

 	public static function getCategoriesByProduct($id)
	{

		try
		{
			$productcategories = DB::table('products_categories')
				->join('categories', 'categories.id', '=', 'products_categories.category_id')
 				->select(
 					'products_categories.id AS id',
 					'products_categories.product_id AS product_id',
					'products_categories.category_id AS category_id',
					'categories.title AS title'
 				)
 				->where('products_categories.product_id', '=', $id)
				->get();

			return array('status' => 1, 'productcategories' => $productcategories);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}



}