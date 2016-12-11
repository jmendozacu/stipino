<?php

/*
*	CategoryRepository
*
*	Handles backend functions
*/



class CategoryRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created category(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $permalink)
	{
	/*	try {*/

			$entry = new Category;
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->category_type = 'blog';

			$entry->save();

			return array('status' => 1);
	/* 	}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   */
	}

	/**
	 * Update the specified category(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $permalink)
	{
    	/*try {*/

			$entry = Category::find($id);
			$entry->title = $title;
			$entry->permalink = $permalink;

			$entry->save();

			return array('status' => 1);
	/*	}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 	 */
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
