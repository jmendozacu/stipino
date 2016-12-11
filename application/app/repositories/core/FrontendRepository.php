<?php
/*
*	Frontend Repository
*
*	Handles functions:
*/



class FrontendRepository
{

    public function __construct(){

    }



	// Register user
	public function storeuser($first_name, $last_name, $email, $password, $address, $zip, $city, $date_of_birth, $phone)
	{
		try
		{
            DB::beginTransaction();

			$entry = new User;

			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->email = $email;
			$entry->password = Hash::make($password);
			$entry->address = $address;
			$entry->city = $city;
			$entry->date_of_birth = $date_of_birth;
			$entry->phone = $phone;
			$entry->user_group = 'user';

			$entry->save();
            

            $clientid = DB::table('users')->orderBy('created_at', 'desc')->first();

            $roleid = DB::table('roles')->where('name','user')->first();
          

            $assignedrole = new AssignedRoles;
            $assignedrole->user_id = $clientid->id;
            $assignedrole->role_id = $roleid->id;

            $assignedrole->save();


		    DB::commit();
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
	public function update($id, $first_name, $last_name, $email, $phone, $title, $note, $content)
	{
    	try {

			$entry = Frontend::find($id);
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->email = $email;
			$entry->phone = $phone;
			$entry->title = $title;
			$entry->note = $note;
			$entry->content = $content;
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
			$entry = Frontend::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


// Register user
	public function storeorder($user_id, $order_id, $first_name, $last_name, $email, $address, $area, $city, $shipping_way, $payment_way, $payment_status, $totalprice, $order_date)
	{
		try
		{


            DB::beginTransaction();


			//create new user
            if(empty($user_id)){
           	
           	$validateuser = DB::table('users')->where('email', $email)->first();
 
           	if(empty($validateuser)){
           	$newuser = new User;
            $newuser->first_name = $first_name;
            $newuser->last_name = $last_name;
            $newuser->email = $email;
            $newuser->address = $address;
            $newuser->area = $area;
            $newuser->city = $city;
            $newuser->type = '1';
            $newuser->user_group = 'user';
            $newuser->password = 'blank';
            $newuser->save();
            
			$user_id = DB::table('users')->orderBy('created_at', 'desc')->pluck('id');

			$salt = "nyfE#e2mT%lR2JB732f*#U6B4h1z$%3rRfF4";
			$permalink = hash('ripemd160', $salt.$email);
			$link = "http://culexvr.com/new-password?token=" . $permalink;


			$passwordlink = new NewPassword;
			$passwordlink->user_id = $user_id;
			$passwordlink->permalink = $permalink;
			$passwordlink->save();


			Mail::send('emails.client_registration_message', array('email' => $email, 'link' => $link ), function($message) use ($email)
        	{
          	$message->from('nikola.papratovic@gmail.com', 'Stipino.com');
          	$message->subject('Hvala na registraciji!');
          	$message->to($email);
        	});
           	}else{

           		$user_id = $validateuser->id;
           	    }
           
            }
             
            $zip_city = DB::table('city')->where('id', $city)->first();
            $cityname = $zip_city->name;
            $cityzip = $zip_city->zip;

           	
			$entry = new Orders;
			$entry->order_id = $order_id;
			$entry->user_id = $user_id;
			$entry->price = $totalprice;
			$entry->shipping_way = $shipping_way;
			$entry->payment_way = $payment_way;
			$entry->payment_status = $payment_status;
			$entry->billing_address = $address . ', ' . $cityzip . ' ' . $cityname;
			$entry->shipping_address = $address . ', ' . $cityzip . ' ' . $cityname;
			$entry->order_date = $order_date;
			$entry->save();

			$order_id = DB::table('orders')->orderBy('created_at', 'desc')->pluck('id');

			

			$cart = Cart::content();

			foreach($cart as $item){
            $orderproducts = new OrdersProducts;
			$orderproducts->order_id = $order_id;
			$orderproducts->product_id = $item->id;
			$orderproducts->quantity = $item->qty;
			$orderproducts->price = $item->price;
			$orderproducts->save();
			}

			
	

		    DB::commit();
			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


// Register user
	public function storenewpassword($token, $password)
	{
		try
		{
            DB::beginTransaction();
			
			$links = DB::table('password_links')->where('permalink', $token)->first();



			$entry = User::find($links->user_id);
			$entry->password = Hash::make($password);
			$entry->save();

			$newspassword = NewPassword::find($links->id);
			$newspassword->delete();

		    DB::commit();
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



	// Add workshop entry
	public function storeworkshopentry($workshop_id, $first_name, $last_name, $address, $zip)
	{
		try
		{
          

			$entry = new WorkshopEntry;
			$entry->workshop_id = $workshop_id;
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->address = $address;
			$entry->zip = $zip;

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



}

