<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductsCategories extends Eloquent
{


    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	protected $table = 'products_categories';

 	public static function getCategoriesByProduct($id)
	{

		try
		{
			$productcategories = DB::table('products_categories')
				->join('categories', 'categories.id', '=', 'products_categories.category_id')
 				->select(
 					'products_categories.id AS id',
 					'products_categories.category_id AS category_id',
					'products_categories.product_id AS product_id',
					'categories.title AS categorytitle'
 				)
 				->where('products_categories.product_id', '=', $id)
 				->whereNull('deleted_at')
				->get();

			return array('status' => 1, 'productcategories' => $productcategories);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

	public static function getEntriesByCategory($category)
	{
	/*	try 
		{ */
			$entry = DB::table('products_categories')
				->join('categories', 'categories.id', '=', 'products_categories.category_id')
				->join('products', 'products.id', '=', 'products_categories.product_id')
				->select(
					'products.id AS id',
					'products.title AS title',
					'products.permalink AS permalink',
					'products.price AS price',
					'products.sale_price AS sale_price',
					'products.onsale AS onsale',
					'products.onstock AS onstock',
					'products.published AS published',
					'products.image AS image',
					'products_categories.category_id AS category_id',
					'products_categories.product_id AS product_id',
					'categories.id AS categories_id',
					'categories.permalink AS categorypermalink'
				)
				->where('categories.id', '=', $category)
				->paginate(12);

			// Default return
			$entries = $entry;


			return array('status' => 1, 'entries' => $entries);
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   */
	} 

}