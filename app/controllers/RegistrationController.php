<?php

class RegistrationController extends \BaseController {


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
        $user = User::create(
           Input::only('username', 'email', 'password')
        );

        Auth::login($user);

        return Redirect::home();
    }
}
