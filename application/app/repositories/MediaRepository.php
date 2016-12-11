<?php

/*
*	MediaRepository 
*
*	Handles backend functions
*/



class MediaRepository {
 
    public function __construct(){

    }
 
 

	/**
	 * Store a newly created media post(s) in storage.
	 *
	 * @return Response
	 */
	public function store($image = null)
	{ 
	try {
 
		if ($image != null)
			{ 			
				foreach ($image as $image)
						{
		 		 		$newimage = new Media;
						if ($image != null)
							{
								// Image data
								$largeImagePath = public_path() . "/uploads/backend/media/";
								$thumbImagePath = public_path() . "/uploads/backend/media/thumbs/";
								// Image name is the same in thumbs and full size image
								$extension = $image->getClientOriginalExtension(); // getting image extension
								$imagename = (substr(md5(rand(1, 9999)), 0, 15)) . '.' . $extension; // renaming image
								$uploadSuccess = Image::make($image->getRealPath())
								->orientate()
								->save($largeImagePath . $imagename) // original
								->fit(1280, 768)
								->crop(768, 432)
								->resize(368, 207)
								->save($thumbImagePath . $imagename) // thumb
								->destroy();
							if ($uploadSuccess)
						{
							$newimage->image = $imagename;
									 
						}
					} 	
					$newimage->save();	
				} 
			}
	 
			return array('status' => 1);
	} 

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 
	}
 
	/**
	 * Update the specified media post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $image = null)
	{
    	try { 
 
			$entry = Media::find($id);

 			$oldImage = $entry->image;


			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/backend/media/";
				$thumbImagePath = public_path() . "/uploads/backend/media/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()

					->save($largeImagePath . $imagename) // original
					->fit(368, 207)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$largeOldImagePath = public_path() . "/uploads/backend/media/" . $oldImage;
					$thumbOldImagePath = public_path() . "/uploads/backend/media/thumbs/"  . $oldImage;

					if (File::exists($largeOldImagePath))
					{
						File::delete($largeOldImagePath);
					}
					if (File::exists($thumbOldImagePath))
					{
						File::delete($thumbOldImagePath);
					}

					$entry->image = $imagename;
				}
			}

			$entry->save();

			return array('status' => 1);
		} 

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 	
	}


	/**
	 * Remove the specified media post(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	 	try 
		{

			$entry = Media::find($id);
 
			$entry->delete();

			

			return array('status' => 1);
	 	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}  
	}

}
