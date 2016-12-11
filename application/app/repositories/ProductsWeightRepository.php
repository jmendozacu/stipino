<?php

/*
*	ProductsWeightRepository
*
*	Handles backend functions
*/



class ProductsWeightRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created products post(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $product_weight, $measure_unit)
	{
		try {

			$entry = new ProductsWeight;
			$entry->title = $title;
			$entry->product_weight = $product_weight;
			$entry->measure_unit = $measure_unit;
			$entry->save();

			return array('status' => 1);
	 	}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

	/**
	 * Update the specified products post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $product_weight, $measure_unit)
	{
    	try {

			$entry = ProductsWeight::find($id);
			$entry->title = $title;
			$entry->product_weight = $product_weight;
			$entry->measure_unit = $measure_unit;

			$entry->save();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


	/**
	 * Remove the specified products post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = ProductsWeight::find($id);

			$entry->delete();


			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
