<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class BlitzPost extends Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];


	protected $table = 'cms';

	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
		'intro'					=>	'required',
	
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer',
 		'title'					=>	'required',
 		'intro'					=>	'required',
	);

	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*/
	public static function getEntries($id = null)
	{
	/*	try 
		{*/
			$entry = DB::table('cms')
				->select(
					'cms.id AS id',
					'cms.title AS title',
					'cms.permalink AS permalink',
					'cms.intro AS intro',
					'cms.published AS published',
					'cms.type AS type',
					'cms.created_at AS created_at'
				)->whereNull('deleted_at')
				
				->orderBy('created_at', 'desc');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('cms.id', '=', $id)->where('cms.type', '=', 'blitzpost')->first();
				return array('status' => 1, 'entry' => $entry);
			}
            else{
              
            $entries = $entry->where('cms.type', '=', 'blitzpost')->get();
            return array('status' => 1, 'entries' => $entries);
            }
			
			// Default return
		
			

			
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}  */
	}


	public static function getPublishedEntries($id = null)
	{
	/*	try 
		{*/
			$entry = DB::table('cms')
				->select(
					'cms.id AS id',
					'cms.title AS title',
					'cms.permalink AS permalink',
					'cms.intro AS intro',
					'cms.published AS published',
					'cms.type AS type',
					'cms.created_at AS created_at'
				)->whereNull('deleted_at')
				->where('published', '1')
				->orderBy('created_at', 'desc');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('cms.id', '=', $id)->where('cms.type', '=', 'blitzpost')->first();
				return array('status' => 1, 'entry' => $entry);
			}
            else{
              
            $entries = $entry->where('cms.type', '=', 'blitzpost')->get();
            return array('status' => 1, 'entries' => $entries);
            }
			
			// Default return
		
			

			
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}  */
	}



}