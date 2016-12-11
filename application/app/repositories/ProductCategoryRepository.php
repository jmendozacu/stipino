<?php

/*
*	ProductCategoryRepository
*
*	Handles backend functions
*/



class ProductCategoryRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created category(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $permalink, $description, $image = null)
	{
		try {

			$entry = new Category;
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->description = $description;
			$entry->category_type = 'product';

			$entry->save();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}

	/**
	 * Update the specified category(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $permalink, $description, $image = null)
	{
    	
    		try {

			$entry = Category::find($id);
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->description = $description;

			$entry->save();

			return array('status' => 1);
		}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 	 
	}


	/**
	 * Remove the specified category(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = Category::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
