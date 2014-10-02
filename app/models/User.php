<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $fillable = [
							'username', 'email', 'firstname', 'lastname', 'address', 'city', 'country', 'password', 'phone', 'picture', 'sex', 'age',
							'department_id', 'user_role_id', 'active', 'date_birth', 'about',
							'facebook', 'link_in', 'google_plus', 'skype'
							];
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
