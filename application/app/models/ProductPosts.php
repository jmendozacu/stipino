<?php

class ProductPosts extends Eloquent
{
	protected $table = 'product_posts';

 	public static function getPostsByProduct($id)
	{

		try
		{
			$entries = DB::table('product_posts')
				->join('cms', 'cms.id', '=', 'product_posts.blog_id')
 				->select(
 					'product_posts.id AS id',
 					'product_posts.product_id AS product_id',
					'product_posts.blog_id AS blog_id',
					'cms.title AS title',
					'cms.permalink AS permalink',
					'cms.intro As intro',
					'cms.image AS image',
					'cms.created_at AS created_at'
 				)
 				->where('product_posts.product_id', '=', $id)
				->get();

			return array('status' => 1, 'productposts' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

}