<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
    protected $fillable = ['username', 'email', 'password'];

    //Passwords must always be hashed
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Register a new user
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public static function register($username, $email, $password)
    {
        $user = new static(compact('username','email', 'password'));

        //raise a new event
        return $user;
    }

}
