<?php

/*
*	BlitzPostRepository
*
*	Handles backend functions
*/



class BlitzPostRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created blog post(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $permalink, $intro, $published)
	{
	/*	try {*/

			$entry = new BlitzPost;
			$entry->title 	= $title;
			$entry->permalink = $permalink;
			$entry->intro 	= $intro;
			$entry->type = 'blitzpost';
			$entry->published = $published;
			$entry->save();

			return array('status' => 1);
	 /*	}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}*/
	}

	/**
	 * Update the specified blog post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $permalink, $intro, $published)
	{
    /*	try {*/

			$entry = BlitzPost::find($id);
			$entry->title 		= $title;
			$entry->permalink 	= $permalink;
			$entry->intro 		= $intro;
			$entry->type = 'blitzpost';
			$entry->published 	= $published;
				


			$entry->save();

			return array('status' => 1);
	/*	}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}*/
	}


	/**
	 * Remove the specified blog post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = BlitzPost::find($id);

			$entry->delete();

		

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
