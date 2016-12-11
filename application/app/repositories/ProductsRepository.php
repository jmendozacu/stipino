<?php

/*
*	ProductsRepository
*
*	Handles backend functions
*/



class ProductsRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created products post(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $permalink, $product_weight, $intro, $description, $price, $sale_price, $manufacturing_price, $onsale, $onstock, $published, $product_category, $blogposts, $image = null, $cover_image = null)
	{
	/*	try {*/

			DB::beginTransaction();

			$entry = new Products;
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->product_weight = $product_weight;
			$entry->intro = $intro;
			$entry->description = $description;
			$entry->price = $price;
			$entry->sale_price = $sale_price;
			$entry->manufacturing_price = $manufacturing_price;
			$entry->onsale = $onsale;
			$entry->onstock = $onstock;
			$entry->published = $published;

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/products/";
				$thumbImagePath = public_path() . "/uploads/frontend/products/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()
					->fit(768, 1024)
					->save($largeImagePath . $imagename) // original
					->crop(768, 768)
					->resize(500, 500)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$entry->image = $imagename;
				}
			}

			if ($cover_image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/products/";

				// Image name is the same in thumbs and full size cover_image
				$extension = $cover_image->getClientOriginalExtension(); // getting cover_image extension
				$cover_imagename = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming cover_image

				$uploadSuccess = Image::make($cover_image->getRealPath())
					->orientate()
					->fit(1200, 325)
					->save($largeImagePath . $cover_imagename) // original
					->destroy();

				if ($uploadSuccess)
				{
					$entry->cover_image = $imagename;
				}
			}

			$entry->save();

			$product = DB::table('products')->orderBy('created_at', 'desc')->first();

			$newproduct = $product->id;

			if ($product_category != null)
			{
				foreach ($product_category as $key=>$value)
				{
					$productcategory = new ProductsCategories;
					$productcategory->product_id = $newproduct;
					$productcategory->category_id = $value;
					$productcategory->save();
				}
			}


			if ($blogposts != null)
			{
				foreach ($blogposts as $key=>$value)
				{
					$productposts = new ProductPosts;
					$productposts->product_id = $newproduct;
					$productposts->blog_id = $value;
					$productposts->save();
				}
			}

			DB::commit();

			$entry->save();

			return array('status' => 1);
	 /*	}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}*/
	}

	/**
	 * Update the specified products post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $title, $permalink, $product_weight, $intro, $description, $price, $sale_price, $manufacturing_price, $onsale, $onstock, $published, $product_category, $blogposts, $image = null, $cover_image = null)
	{
    /*	try {*/

    			DB::beginTransaction();

			$entry = Products::find($id);
			$entry->title = $title;
			$entry->permalink = $permalink;
			$entry->product_weight = $product_weight;
			$entry->intro = $intro;
			$entry->description = $description;
			$entry->price = $price;
			$entry->sale_price = $sale_price;
			$entry->manufacturing_price = $manufacturing_price;
			$entry->onsale = $onsale;
			$entry->onstock = $onstock;
			$entry->published = $published;
 			$oldImage = $entry->image;



			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/products/";
				$thumbImagePath = public_path() . "/uploads/frontend/products/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()
					->fit(768, 1024)
					->save($largeImagePath . $imagename) // original
					->crop(768, 768)
					->resize(500, 500)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$largeOldImagePath = public_path() . "/uploads/frontend/products/" . $oldImage;
					$thumbOldImagePath = public_path() . "/uploads/frontend/products/"  . $oldImage;

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

			if ($cover_image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/products/";

				// Image name is the same in thumbs and full size cover_image
				$extension = $cover_image->getClientOriginalExtension(); // getting cover_image extension
				$cover_imagename = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming cover_image

				$uploadSuccess = Image::make($cover_image->getRealPath())
					->orientate()
					->fit(1200, 325)
					->save($largeImagePath . $cover_imagename) // original
					->destroy();

				if ($uploadSuccess)
				{
					$largeOldImagePath = public_path() . "/uploads/frontend/products/" . $oldImage;

					if (File::exists($largeOldImagePath))
					{
						File::delete($largeOldImagePath);
					}

					$entry->cover_image = $cover_imagename;
				}
			}

			$entry->save();

			

			$newproduct = $id;
			

			if ($product_category != null)
			{
				DB::table('products_categories')
				->where('product_id', '=', $id)
				->delete();
				
				foreach ($product_category as $key=>$value)
				{

					$productcategory = new ProductsCategories;
					$productcategory->product_id = $newproduct;
					$productcategory->category_id = $value;
					$productcategory->save();
				}
			}
                

			if ($blogposts != null)
			{
				DB::table('product_posts')
				->where('product_id', '=', $id)
				->delete();
				foreach ($blogposts as $key=>$value)
				{
					$productposts = new ProductPosts;
					$productposts->product_id = $newproduct;
					$productposts->blog_id = $value;
					$productposts->save();
				}
			}
            
            		DB::commit();

			return array('status' => 1);
	/*	}

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}*/
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
			$entry = Products::find($id);

			$entry->delete();


			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
