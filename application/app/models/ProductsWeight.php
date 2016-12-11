<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductsWeight extends Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];


	protected $table = 'product_weight';

	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
		'product_weight'		=>	'required',
		'measure_unit'			=>	'required'
	);

	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer',
 		'product_weight'		=>	'required',
		'measure_unit'			=>	'required'
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
		{ */
			$entry = DB::table('product_weight')
				
				->select(
					'product_weight.id AS id',
					'product_weight.title AS title',
					'product_weight.product_weight AS product_weight',
					'product_weight.measure_unit AS measure_unit',
					'product_weight.created_at AS created_at',
					'product_weight.updated_at AS updated_at'

				)->whereNull('deleted_at');

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('product_weight.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry;

			$entries = $entry->get();

			return array('status' => 1, 'entries' => $entries);
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   */
	} 


}