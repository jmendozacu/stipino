<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Pages extends Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];


	protected $table = 'cms';

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
	*	$published	->	true	or null ->	get published or all cmss
	*/
	public static function getEntries($id = null, $items = null)
	{
	/*	try
		{ */
			$entry = DB::table('cms')
				->select(
					'cms.id AS id',
					'cms.title AS title',
					'cms.permalink AS permalink',
					'cms.content AS content',
					'cms.type AS type',
					'cms.published AS published',
					'cms.created_at AS created_at',
					'cms.updated_at AS updated_at'
				)->whereNull('deleted_at');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('cms.id', '=', $id)->where('cms.type', '=', 'page')->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				// Return all entries
				$entries = $entries->where('cms.type', '=', 'page')->get();
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->where('cms.type', '=', 'page')->take($items)->get();
			}

			return array('status' => 1, 'entries' => $entries);
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} */
	}

	/*
	*	Get entry by permalink
	*
	*	$permalink 		->	integer or null	->	if set, retrieve specific entry 
	*/
	public static function getEntryByPermalink($permalink = null)
	{
	try
		{  
			$entry = DB::table('cms')
				->select(
					'cms.id AS id',
					'cms.title AS title',
					'cms.permalink AS permalink',
					'cms.content AS content',
					'cms.type AS type',
					'cms.published AS published',
					'cms.created_at AS created_at',
					'cms.updated_at AS updated_at'
				);

			if ($permalink != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('cms.permalink', '=', $permalink)->where('cms.type', '=', 'page')->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;
 

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 
	}


	 
	public static function getEntriesByCategory ($category)
	{
		try
		{
			$entry = DB::table('products')
				->join('cms', 'cms.id', '=', 'products.category')

				->select(
					'cms.id AS id',
					'cms.first_name AS first_name',
					'cms.last_name AS last_name',
					'cms.email AS email',
					'cms.phone AS phone',
					'cms.title AS title',
					'cms.permalink AS permalink',
					'cms.note AS note',
					'cms.location AS location',
					'cms.status AS status',
					'cms.category AS category',
					'cms.service AS cmsservice',
					'cms.image AS image',
					'cms.content AS content',
					'cms.published AS published',
					'cms.created_at AS created_at',
					'cms.updated_at AS updated_at'
				)

 			->where('categories.title', '=', $category);

			$entry = $entry->where('cms.published', '=', '1')->get();

			return array('status' => 1, 'entry' => $entry);

		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

		public static function getCountPublished()
		{

			try
			{
				$countedPublished = DB::table('cms')
	 				->select(
						'cms.id AS id',
						'cms.published AS published'
	 				)
	 				->where('published', '=', 'objavljeno')
					->get();

				return array('status' => 1, 'counted_published_post_number' => count($countedPublished));
			}
			catch (Exception $exp)
			{
				return array('status' => 0, 'reason' => $exp->getMessage());
			}
		}

		public static function countPages()
	    {
	        try
	        {
	            $users['total'] = Pages::count();
	            return array('status' => 1, 'number' => $users);

	        }
	        catch(Exception $exp)
	        {
	            return array('status' => 0);
	        }
	    }

}