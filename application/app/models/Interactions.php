<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;


class Interactions extends Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	protected $table = 'interactions';

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
	public static function getEntries($id = null)
	{
	 	try 
		{  
			$entry = DB::table('interactions')
				->select(
					'interactions.id AS id',
					'interactions.user_id AS user_id',
					'interactions.order_id AS order_id',
					'interactions.type AS type',
					'interactions.price AS price',
					'interactions.note AS note',
					'interactions.message AS message',
					'interactions.order_date AS order_date',
					'interactions.created_at AS created_at'
				)->whereNull('deleted_at')
				->orderBy('created_at', 'desc');


			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('user_id', '=', $id)->get();
				return array('status' => 1, 'entry' => $entry);
			}
 
			}		
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}    
	} 



}