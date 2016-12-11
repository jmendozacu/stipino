<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OrdersProducts extends Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	protected $table = 'orders_products';
	

	 	public static function getEntries($id = null)
	{
		
		try
		{
			$entry = DB::table('orders_products')
				->join('products', 'products.id', '=', 'orders_products.product_id')  
				->join('product_weight', 'product_weight.id', '=', 'products.product_weight')

 				->select(
 					'orders_products.id AS id',
 					'orders_products.product_id AS product_id',
					'orders_products.order_id AS order_id',
					'orders_products.quantity AS quantity',
					'orders_products.price AS productprice',
					'products.title AS title' ,
					'product_weight.title AS producttitle'
 				)->whereNull('orders_products.deleted_at');
				

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('orders_products.order_id', '=', $id)->get();
					return array('status' => 1, 'entry' => $entry);
				}
				else
				{
					$entry = $entry->get();
					return array('status' => 1, 'entry' => $entry);
				}

				// Default return
				$entries = $entry;
 
				$entries = $entry->get();
 
		
			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

	 	public static function getOrderByCustomer($order_id)
	{

		try
		{
			$orderbycustomer = DB::table('orders_products')
				->leftjoin('orders', 'orders.id', '=', 'orders_products.order_id')
 				->select(
 					'orders_products.id AS id',
 					'orders_products.product_id AS product_id',
					'orders_products.order_id AS order_id',
					'orders_products.quantity AS quantity'
 				)
 				->where('orders_products.order_id', '=', $order_id)
				->get();

			return array('status' => 1, 'orderbycustomer' => $orderbycustomer);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}


	}

}