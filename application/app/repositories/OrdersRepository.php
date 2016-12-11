<?php

/*
*	OrdersRepository
*
*	Handles backend functions
*/



class OrdersRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created products post(s) in storage.
	 *
	 * @return Response
	 */
	public function store($order_id, $user_id, $order_date, $products_array, $quantity, $shipping_way, $payment_way, $payment_status, $billing_address, $shipping_address, $note) //, $singleprice, $totalprice
	{
	/*	try {*/
			DB::beginTransaction();

			$entry = new Orders;
			$entry->order_id = $order_id;
			$entry->user_id = $user_id;
			//$entry->price = $totalprice;
			$entry->shipping_way = $shipping_way;
			$entry->payment_way = $payment_way;
			$entry->payment_status = $payment_status;
			$entry->billing_address = $billing_address;
			$entry->shipping_address = $shipping_address;
			$entry->note = $note;
			$entry->order_date = $order_date;
			$entry->save();


			$orderprice = 0;

			$singleprices = Products::getPrices();

			$order = DB::table('orders')->orderBy('created_at', 'desc')->first();

			$order = $order->id;

			$i = 0;
			$ilen = count($products_array); 

			if ($products_array != null)
			{
				foreach ($products_array as $key=>$value)
				{
					if(++$i == $ilen) break;
					$orderproduct = new OrdersProducts;
					$orderproduct->order_id = $order;
					$orderproduct->product_id = $value;
					$orderproduct->quantity = $quantity[$key];
					$orderproduct->price = $singleprices['entries'][$key]->price;
					$orderprice = $orderprice + ($singleprices['entries'][$key]->price * $quantity[$key]);
					$orderproduct->save();
				}
			}


			


			$order = DB::table('orders')->orderBy('created_at', 'desc')->first();
		        	
		        	$order_id  = $order->id;

		           $order = Orders::find($order_id);

		           $order->price = $orderprice;

		           $order->save();

	    if($payment_status == 'zavrseno'){
			
         $interaction = new Interactions;
         $interaction->user_id = $user_id;
         $interaction->order_id = $order_id;
		 $interaction->price = $orderprice;
		 $interaction->order_date = $order_date;
		 $interaction->type = 'Prodaja';
	     $interaction->save();
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
	 * Update the specified products post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $order_id, $user_id, $order_date, $products_array, $quantity, $shipping_way, $payment_way, $payment_status, $shipping_address, $billing_address, $note)
	{
    /*	try {*/

			DB::beginTransaction();

			$entry = Orders::find($id);
			$entry->order_id = $order_id;
			$entry->user_id = $user_id;
			//$entry->price = $totalprice;
			$entry->shipping_way = $shipping_way;
			$entry->payment_way = $payment_way;
			$entry->payment_status = $payment_status;
			$entry->shipping_address = $shipping_address;
			$entry->billing_address = $billing_address;
			$entry->note = $note;
			$entry->order_date = $order_date;

			/*if($newaddress != null)
			{
				$entry->shipping_address = $address;
			} else {
				$getaddress = DB::table('users')->where('id', '=', $user_id)->get();
				$getaddress = $getaddress->address;
				$entry->shipping_address = $getaddress;
			}*/

			$entry->save();

			$orderprice = 0;

			$singleprices = Products::getPrices();

			$order = DB::table('orders')->where('orders.id', $id)->first();

			$order = $order->id;

			$i = 0;
			$ilen = count($products_array); 

			if ($products_array != null)
			{
				DB::table('orders_products')->where('order_id', $id)->delete();
				foreach ($products_array as $key=>$value)
				{
					if(++$i == $ilen) break;
					$orderproduct = new OrdersProducts;
					$orderproduct->order_id = $order;
					$orderproduct->product_id = $value;
					$orderproduct->quantity = $quantity[$key];
					$orderproduct->price = $singleprices['entries'][$key]->price;
					$orderprice = $orderprice + ($singleprices['entries'][$key]->price * $quantity[$key]);
					$orderproduct->save();
				}
			}

			$order = DB::table('orders')->orderBy('updated_at', 'desc')->first();
		        	
		           $order_id  = $order->id;

		           $order = Orders::find($order_id);

		           $order->price = $orderprice;

		           $order->save();

         if($payment_status == 'zavrseno'){
		 DB::table('interactions')->where('order_id', $id)->delete();
         $interaction = new Interactions;
         $interaction->user_id = $user_id;
         $interaction->order_id = $order_id;
		 $interaction->price = $orderprice;
		 $interaction->order_date = $order_date;
		 $interaction->type = 'Prodaja';
	     $interaction->save();
		}else{
			DB::table('interactions')->where('order_id', $id)->delete();
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
			$entry = Orders::find($id);

			$entry->delete();


			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
