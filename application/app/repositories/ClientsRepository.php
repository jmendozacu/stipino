<?php

/*
*	ClientsRepository
*
*	Handles backend functions
*/



class ClientsRepository {

    public function __construct(){

    }



	/**
	 * Store a newly created widget post(s) in storage.
	 *
	 * @return Response
	 */
	public function store($first_name, $last_name, $type, $oib, $email, $additional_email, $block, $contact_person, $phone, $additional_phone, $permalink, $username, $user_group, $password, $area, $address, $city, $region, $note)
	{
	/*	try {*/
           DB::beginTransaction();
			$entry = new User;
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->type = $type;
			$entry->oib = $oib;
			$entry->email = $email;
			$entry->additional_email = $additional_email;
			$entry->contact_person = $contact_person;
			$entry->phone = $phone;
			$entry->additional_phone = $additional_phone;
			$entry->user_group = 'user';
			$entry->area = $area;
			$entry->address = $address;
			$entry->city = $city;
			$entry->region = $region;
			$entry->note = $note;

			$entry->save();

		 $userId = DB::table('users')->whereNull('deleted_at')->orderBy('created_at', 'desc')->pluck('id');
		
    
		 $interaction = new Interactions;
         $interaction->user_id = $userId;
         $interaction->note = $note;
		 $interaction->type = 'Napomena';
	     $interaction->save();


			DB::Commit();

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
	public function update($id, $first_name, $last_name, $type, $oib, $email, $additional_email, $block, $contact_person, $phone, $additional_phone, $permalink, $username, $user_group, $password, $area, $address, $city, $region, $note)
	{
    /*	try {*/

    		DB::beginTransaction();

			$entry = User::find($id);
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->type = $type;
			$entry->oib = $oib;
			$entry->email = $email;
			$entry->additional_email = $additional_email;
			$entry->contact_person = $contact_person;
			$entry->phone = $phone;
			$entry->additional_phone = $additional_phone;
			$entry->user_group = '1';
			$entry->area = $area;
			$entry->address = $address;
			$entry->city = $city;
			$entry->region = $region;
			$entry->note = $note;
			$entry->save();

			$interaction = new Interactions;
            $interaction->user_id = $id;
            $interaction->note = $note;
		    $interaction->type = 'Napomena';
	        $interaction->save();


            DB::Commit();
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
			$entry = User::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
