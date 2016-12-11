<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	protected $table = 'categories';

	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required'
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer'
	);

	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntries($id = null, $permalink = null, $items = null)
	{
		try
		{
			$entry = DB::table('categories')
				->select(
					'categories.id AS id',
					'categories.title AS title',
					'categories.permalink AS permalink',
					'categories.image AS image',
					'categories.category_type AS category_type',
					'categories.description AS description'
				)->whereNull('deleted_at');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('categories.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			if ($permalink != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('categories.permalink', '=', $permalink)->first();
				return array('status' => 1, 'entry' => $entry);
			}
			
			// Default return
			$entries = $entry;

			if ($items == null)
			{

				
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




	public static function getProductCategories($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('categories')
				->select(
					'categories.id AS id',
					'categories.title AS title',
					'categories.permalink AS permalink',
					'categories.image AS image',
					'categories.category_type AS category_type',
					'categories.description AS description'
				)
				->where('category_type', '=', 'product')
				->whereNull('deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('categories.id', '=', $id)->first();
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


	public static function getBlogCategories($id = null, $items = null, $paginate)
	{
		try
		{
			$entry = DB::table('categories')
				->select(
					'categories.id AS id',
					'categories.title AS title',
					'categories.permalink AS permalink',
					'categories.image AS image',
					'categories.category_type AS category_type',
					'categories.description AS description'
				)
				->where('category_type', '=', 'blog')
				->whereNull('deleted_at');
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('categories.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
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
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}




}