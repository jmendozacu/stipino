<?php

/*
*	PagesRepository
*
*	Handles backend functions
*/



class PagesRepository {

    public function __construct(){

    }


	/**
	 * Store a newly created quote(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $permalink, $content, $type, $published)
	{
		try { 
			$entry = new Pages;
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->content = $content;
			$entry->type = 'page';
			$entry->published = $published;

			$entry->save();

			return array('status' => 1);
	 	}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 
	}

	/**
	 * Update the specified quote(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $permalink, $content, $type, $published)
	{
    	try {

			$entry = Pages::find($id);
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->content = $content;
			$entry->type = 'page';
			$entry->published = $published;

			$entry->save();

			return array('status' => 1);
		}

	 	catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


	/**
	 * Remove the specified quote(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = Pages::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
