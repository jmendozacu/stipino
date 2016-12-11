<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Blog extends Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];


	protected $table = 'cms';

	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
		'intro'					=>	'required',
		'content'				=>	'required',
		'image'					=>	'required'
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer',
 		'title'					=>	'required',
 		'intro'					=>	'required',
		'content'				=>	'required'
	);

	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntries($id = null, $permalink = null, $items = null, $category = null, $paginate)
	{
	/*	try 
		{*/
			$entry = DB::table('cms')
			->join('categories', 'categories.id', '=', 'cms.category')
				->select(
					'cms.id AS id',
					'cms.title AS title',
					'cms.permalink AS permalink',
					'cms.intro AS intro',
					'cms.content AS content',
					'cms.published AS published',
					'cms.category AS category',
					'cms.type AS type',
					'cms.image AS image',
					'cms.created_at AS created_at',
					'categories.title AS categorytitle'
				)->whereNull('cms.deleted_at')
				->orderBy('cms.created_at', 'desc');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('cms.id', '=', $id)->where('cms.type', '=', 'blog')->first();
				return array('status' => 1, 'entry' => $entry);
			}

			if ($permalink != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('cms.permalink', '=', $permalink)->where('cms.type', '=', 'blog')->first();
				return array('status' => 1, 'entry' => $entry);
			}
	       $entries = $entry;

			if ($category != null)
			{
				// Retrieve specific entry
				if ($paginate == 'true')
				// Return all entries
				$entries = $entries->where('cms.type', '=', 'blog')->where('cms.category', '=', $category)->paginate(5);
				else
				{
					$entries = $entry->where('cms.category', '=', $category)->where('cms.type', '=', 'blog')->get();
				}
				
				return array('status' => 1, 'entry' => $entries);
			}
			// Default return
		

	 
			if ($items == null)
			{	
				if ($paginate == 'true')
				// Return all entries
				$entries = $entries->where('cms.type', '=', 'blog')->paginate(5);
				else
				{
					$entries = $entries->where('cms.type', '=', 'blog')->get();
				}
			}
			else
			{
				$entries = $entries->where('cms.type', '=', 'blog')->get();
			}
 

			return array('status' => 1, 'entries' => $entries);
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}  */
	}


	/*
	*	Get last entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntriesReversed($id = null, $permalink = null, $items = null)
	{
	/*	try 
		{*/
			$entry = DB::table('cms')
				->select(
					'cms.id AS id',
					'cms.title AS title',
					'cms.permalink AS permalink',
					'cms.created_at AS created_at'
				)
				->orderBy('created_at', 'desc')
				->whereNull('deleted_at');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('cms.id', '=', $id)->where('cms.type', '=', 'blog')->first();
				return array('status' => 1, 'entry' => $entry);
			}

			if ($permalink != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('cms.permalink', '=', $permalink)->where('cms.type', '=', 'blog')->first();
				return array('status' => 1, 'entry' => $entry);
			}


			// Default return
			$entries = $entry;

	 
			if ($items == null)
			{	
				$entries = $entries->where('cms.type', '=', 'blog')->take(3)->get();
			}
			else
			{
				$entries = $entries->where('cms.type', '=', 'blog')->get();
			}
 

			return array('status' => 1, 'entries' => $entries);
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}  */
	}






}