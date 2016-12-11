<?php

/*
*	WidgetRepository
*
*	Handles backend functions
*/



class WidgetRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created widget post(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $permalink, $content, $type, $published)
	{
	/*	try {*/

			$entry = new Widget;
			$entry->title 	= $title;
			$entry->permalink = $permalink;
			$entry->content = $content;
			$entry->type = 'widget';
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
	 * Update the specified widget post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $permalink, $content, $type, $published)
	{
    /*	try {*/

			$entry = Widget::find($id);
			$entry->title 	= $title;
			$entry->permalink = $permalink;
			$entry->content = $content;
			$entry->type = 'widget';
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
	 * Remove the specified widget post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			$entry = Widget::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
