<?php

class Frontend extends Eloquent
{
	protected $table = 'quote';

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
	public static function getEntries($id = null, $items = null)
	{
	/*	try
		{*/
			$entry = DB::table('quote')
				->select(
					'quote.id AS id',
					'quote.first_name AS first_name',
					'quote.last_name AS last_name',
					'quote.email AS email',
					'quote.phone AS phone',
					'quote.title AS title',
					'quote.service AS service',
					'quote.note AS note',
					'quote.location AS location',
					'quote.status AS status',
					'quote.category AS category',
					'quote.image AS image',
					'quote.content AS content',
					'quote.created_at AS created_at',
					'quote.updated_at AS updated_at'
				);
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('quote.id', '=', $id)->first();
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
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} */
	}





}