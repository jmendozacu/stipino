<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface
{


	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	use UserTrait, RemindableTrait;
	use HasRole;

    protected $fillable = array('first_name','last_name','email','password','created_at','updated_at');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
    * Get the unique identifier for the user.
    *
    * @return mixed
    */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
    * Get the password for the user.
    *
    * @return string
    */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
    * Get the e-mail address where password reminders are sent.
    *
    * @return string
    */
    public function getReminderEmail()
    {
        return $this->email;
    }

	// Edit user rules (admin)
	public static function edit_user_rules_admin($id)
	{
		return array(
			'id'					=>	'required|integer',
			'email'					=>	'required|email|unique:users,email,'. $id .'|email',
			'first_name'			=>	'required',
			'last_name'				=>	'required',
			'language'				=>	'required|integer',
			'role'					=>	'required|integer'
		);
	}
	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
		'intro'					=>	'required',
		'content'				=>	'required',
		'image'					=>	'required'
	);

		// New entry validation
	public static $client_store_rules = array(
		'first_name'			=>	'required',
		'phone'					=>	'required',
		'address'				=>	'required'
	);

	// Register_rules for new user
	public static $register_rules = array(
			'email'					=>	'required|email|unique:users',
			'first_name'			=>	'required',
			'last_name'				=>	'required',
			'password'				=>	'required',
			'repeat_password'		=>	'required|same:password'
	);


	// Forgotten password rules
	public static $forgotten_password_rules = array(
		'email'		=>	'required|email|exists:users,email'
	);



	/*
	*	Retrieve user's informations
	*
	*	Uses:
	*	$id			-	null for all, integer for user
 	*/
	public static function getUserInfos($id = null)
	{
		if ($id != null)
		{
			// Retrieve specific user informations
			try
			{
				$user = DB::table('users')
 					->select(
						'users.id AS id',
						'users.permalink AS permalink',
						'users.username AS username',
						'users.user_group AS user_group',
						'users.email AS email',
						'users.password AS password',
						'users.first_name AS first_name',
						'users.last_name AS last_name',
						'users.address AS address',
						'users.created_at AS created_at',
						'users.updated_at AS updated_at'
						)
 					->orderBy('id', 'DESC')
					->where('users.id', '=', $id)
					->whereNull('deleted_at')
					->first();

				return array('status' => 1, 'user' => $user);
			}
			catch (Exception $exp)
			{
				return array('status' => 0, 'reason' => $exp->getMessage());
			}
		}

	}

	/*
	*	Get entries
	*
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all
	*	$user_group	->	admin / dentist / user
	*/
	public static function getEntries($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('users')
				->join('city', 'city.id', '=', 'users.city')
		        		->join('region', 'region.id', '=', 'users.region')
				->select(
					'users.id AS id',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.type AS type',
					'users.oib AS oib',
					'users.block AS block',
					'users.contact_person AS contact_person',
					'users.phone AS phone',
					'users.additional_phone AS additional_phone',
					'users.note AS note',
					'users.permalink AS permalink',
					'users.username AS username',
					'users.user_group AS user_group',
					'users.email AS email',
					'users.additional_email AS additional_email',
					'users.password AS password',
					'users.address AS address',
					'users.city AS city',
					'users.region AS region',
					'users.area AS area',
					'users.created_at AS created_at',
					'users.updated_at AS updated_at',
					'city.name AS cityname',
					'region.name AS regionname'
				)->whereNull('deleted_at')
				->orderBy('id', 'ASC');

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('users.id', '=', $id)->first();
					return array('status' => 1, 'entry' => $entry);
				}
	 	
				// Default return
				$entries = $entry;

				if ($items == null)
				{
					// Return all entries
					$entries = $entries->get();
				}
				else
				{
					// Return specific number of entries
					$entries = $entries->take($items)->get();
				}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


	// Get user by e-mail
	public static function getUserByEmail($email = null)
	{
		if ($email != null)
		{
			// Retrieve specific user informations
			try
			{
				$user = DB::table('users')
					->select(
						'users.id AS id',
						'users.email AS email',
						'users.first_name AS first_name',
						'users.last_name AS last_name',
						'users.address AS address',
						'users.city AS city',
						'users.phone AS phone',
						'users.job_title AS job_title',
						'users.biography AS biography',
						'users.image AS image',
						'users.facebook_id AS facebook_id',
						'users.google_id AS google_id',
						'users.is_banned AS is_banned',
						'users.is_deleted AS is_deleted',
						'users.email_is_verified AS email_is_verified',
						'users.created_at AS created_at',
						'users.updated_at AS updated_at',
						'users.language AS language_id'
						)->whereNull('deleted_at')
					->where('users.email', '=', $email)
					->first();

				return array('status' => 1, 'user' => $user);
			}
			catch (Exception $exp)
			{
				return array('status' => 0, 'reason' => $exp->getMessage());
			}
		}
		else
		{
			return array('status' => 0, 'reason' => 'No e-mail entered.');
		}
	}


	public static function countUsers($user_group)
    {
        try
        {
            $users['total'] = User::where('user_group','=', $user_group)->count();
            return array('status' => 1, 'number' => $users);

        }
        catch(Exception $exp)
        {
            return array('status' => 0);
        }
    }

    public static function getPaginateEntries($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('users')
				->join('city', 'city.id', '=', 'users.city')
		        		->join('region', 'region.id', '=', 'users.region')
				->select(
					'users.id AS id',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.type AS type',
					'users.oib AS oib',
					'users.block AS block',
					'users.contact_person AS contact_person',
					'users.phone AS phone',
					'users.note AS note',
					'users.permalink AS permalink',
					'users.username AS username',
					'users.user_group AS user_group',
					'users.email AS email',
					'users.password AS password',
					'users.address AS address',
					'users.city AS city',
					'users.region AS region',
					'users.area AS area',
					'users.created_at AS created_at',
					'users.updated_at AS updated_at',
					'city.name AS cityname',
					'region.name AS regionname'
				)->whereNull('deleted_at')
				->orderBy('id', 'ASC');

				if ($id != null)
				{
					// Retrieve specific entry
					$entry = $entry->where('users.id', '=', $id)->first();
					return array('status' => 1, 'entry' => $entry);
				}
	 	
				// Default return
				$entries = $entry;

				if ($items == null)
				{
					// Return all entries
					$entries = $entries->paginate(10);
				}
				else
				{
					// Return specific number of entries
					$entries = $entries->take($items)->paginate(10);
				}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}
}
