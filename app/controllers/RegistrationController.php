<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Core\CommandBus;
class RegistrationController extends \BaseController {

    use CommandBus;

    private $registrationForm;

    function __construct( RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
    }
	/**
	 * Show the form to register a user.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
    }

    /**
     * Create a new user.
     *
     * @return Response
     */
    public function store()
    {
        extract(Input::only('username', 'email', 'password'));
        $this->registrationForm->validate(Input::all());
        $command = new RegisterUserCommand($username, $email, $password);

        $user = $this->execute(
            new RegisterUserCommand($username, $email, $password)
        );

        Auth::login($user);

        return Redirect::home();
    }
}
