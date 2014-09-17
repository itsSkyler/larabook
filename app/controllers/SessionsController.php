<?php

use Illuminate\Support\Facades\Redirect;
use Larabook\Forms\SignInForm;
use Laracasts\Flash\Flash;

class SessionsController extends \BaseController {

    /**
     * @var SignInForm
     */
    private $signInForm;

    public function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;
        $this->beforeFilter('guest', ['except' => 'destroy']);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for signing in.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $formData = Input::only('email', 'password');
        $this->signInForm->validate($formData);

        if ( ! Auth::attempt($formData))
        {
            Flash::message('We were unable to sign you in. Please check your credentials.');

            return Redirect::back()->withInput();
        }

        Flash::message('Welcome Back!');
        return Redirect::intended('statuses');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Log a user out of larabook.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
        Auth::logout();

        Flash::message('You have now been logged out.');
        return Redirect::home();
	}


}
