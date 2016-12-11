<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Media extends Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];


	protected $table = 'media';
 
	// New entry validation
	public static $store_rules = array(
 
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
	public static function getEntries($id = null, $permalink = null, $items = null, $paginate)
	{
		 try 
		{     
			$entry = DB::table('media')
				->select(
					'media.id AS id',
					'media.permalink AS permalink', 
					'media.image AS image', 
					'media.created_at AS created_at'
				)->whereNull('deleted_at');
			
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('media.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			if ($permalink != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('media.permalink', '=', $permalink)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry; 
		  
			if ($items == null)
			{
				// Return all entries
				if ($paginate == 'true')
				// Return all entries
				$entries = $entries->orderBy('created_at', 'desc')->paginate(12);
				else
				{
				$entries = $entries->orderBy('created_at', 'desc')->get();
				}
				
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->orderBy('created_at', 'desc')->take($items)->get();
			}

			return array('status' => 1, 'entries' => $entries);
	 	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	} 


}