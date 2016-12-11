<?php

class ClientInfoController extends \BaseController {

	public function getAddress($id)
	{
	  $address = DB::table('users')->where('id', '=', $id)->pluck('address');
	 
	  $city = DB::table('city')->join('users', 'users.city', '=', 'city.id')->where('users.id', $id)->first();

	  //$region = DB::table('region')->join('users', 'users.region', '=', 'region.id')->where('users.id', $id)->pluck('name');

	  return Response::json(['success'=>true, 'info'=>$address . ', ' . $city->zip . ' ' . $city->name]);
	}

	public function getCity($areaid)
	{
	  

	  $city = DB::table('area')->where('area.id', $areaid)->pluck('city');

	  return Response::json(['success'=>true, 'city'=>$city]);
	}

}