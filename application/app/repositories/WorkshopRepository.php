<?php

/*
*	WorkshopRepository
*
*	Handles backend functions
*/



class WorkshopRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created widget post(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $permalink, $intro, $content, $image = null, $workshop_date, $published)
	{
	/*	try {*/

			$entry = new Workshop;
			$entry->title = $title;
			$entry->permalink = $permalink;
            $entry->intro = $intro;
			$entry->content = $content;
			$entry->type = 'workshop';
			$entry->workshop_date = $workshop_date;
			$entry->published = $published;
		    
           if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/workshops/";
				$thumbImagePath = public_path() . "/uploads/frontend/workshops/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()
					->fit(500, 500)
					->save($largeImagePath . $imagename) // original
					->crop(500, 500)
					->resize(300, 175)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$entry->image = $imagename;
				}
			}

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
	public function update($id, $title, $permalink, $intro, $content, $image = null, $workshop_date, $published)
	{
    /*	try {*/

			$entry = Workshop::find($id);
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->intro = $intro;
			$entry->content = $content;
			$entry->workshop_date = $workshop_date;
			$entry->published = $published;
			$oldImage = $entry->image;

            if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/workshops/";
				$thumbImagePath = public_path() . "/uploads/frontend/workshops/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()
					->fit(500, 500)
					->save($largeImagePath . $imagename) // original
					->crop(500, 500)
					->resize(300, 175)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$entry->image = $imagename;
				}
			}


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
			$entry = Workshop::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
