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
        User::create(
           Input::only('username', 'email', 'password')
        );
        return Redirect::home();
    }
}
