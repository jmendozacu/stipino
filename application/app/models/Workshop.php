<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Workshop extends Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];


	protected $table = 'cms';

	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
		'content'				=>	'required'
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer',
 		'title'					=>	'required',
		'content'				=>	'required'
	);

	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntries($id = null, $permalink = null, $items = null, $paginate)
	{
	/*	try 
		{*/
			$entry = DB::table('cms')
				->select(
					'cms.id AS id',
					'cms.title AS title',
					'cms.permalink AS permalink',
					'cms.intro AS intro',
					'cms.content AS content',
					'cms.type AS type',
					'cms.image AS image',
					'cms.workshop_date AS workshop_date',
					'cms.published AS published',
					'cms.created_at AS created_at'

			
				)->whereNull('cms.deleted_at');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('cms.id', '=', $id)->where('cms.type', '=', 'workshop')->first();
				return array('status' => 1, 'entry' => $entry);
			}

			if ($permalink != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('cms.permalink', '=', $permalink)->where('cms.type', '=', 'workshop')->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			if ($items == null)
			{
				if ($paginate == 'true')
				// Return all entries
				$entries = $entries->where('cms.type', '=', 'workshop')->paginate(5);
				else
				{
					$entries = $entries->where('cms.type', '=', 'workshop')->get();
				}
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->where('cms.type', '=', 'workshop')->take($items)->get();
			}

			return array('status' => 1, 'entries' => $entries);
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}  */
	}


}