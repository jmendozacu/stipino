<?php

class Area extends Eloquent
{
	protected $table = 'area';


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
			$entry = DB::table('area')
				->join('city', 'city.id', '=', 'area.city')
				->select(
					'area.id AS id',
					'area.name AS name',
					'area.city AS city',
					'area.permalink AS permalink',
					'city.name AS cityname'
				);

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('area.id', '=', $id)->first();
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




}