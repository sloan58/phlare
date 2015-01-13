<?php

class NumberController extends \BaseController {

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Contact Model
     * @var Contact
     */
    protected $contact;

    /**
     * Inject the models.
     * @param User $user
     */
    public function __construct(User $user, Contact $contact)
    {
        parent::__construct();

        $this->user = $user;
        $this->contact = $contact;
    }

	/**
	 * Display a listing of the resource.
	 * GET /number
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /number/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $contactId = Input::get('contactId');

        return View::make('numbers.create')
            ->with('contactId', $contactId);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /number
	 *
	 * @return Response
	 */
	public function store()
	{
        // validate
        $rules = [
            'number' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('numbers/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            // store
            $number = Number::create([
                'number' => Input::get('number'),
                'label' => Input::get('label'),
                'contact_id' => Input::get('contactId'),

            ]);

            // redirect
            Session::flash('message', 'Successfully created number!');
            return Redirect::to('contacts/' . Input::get('contactId') . '/edit');
        }
	}

	/**
	 * Display the specified resource.
	 * GET /number/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        // get the contact
        $number = Number::find($id);

        // show the view and pass the contact to it
        return View::make('numbers.show')
            ->with('number', $number);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /number/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        // get the contact
        $number = Number::find($id);

        // show the edit form and pass the contact
        return View::make('numbers.edit')
            ->with('number', $number);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /number/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        // validate
        $rules = [
            'number' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('numbers/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            // store
            $number = Number::find($id);
            $number->number = Input::get('number');
            $number->label = Input::get('label');
            $number->save();

            // redirect
            Session::flash('message', 'Successfully updated number!');
            return Redirect::to('contacts/' . $number->contact_id . '/edit');

        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /number/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $contact = Input::get('contactId');
        // delete
        $number = Number::find($id);
        $number->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the number!');
        return Redirect::to('contacts/' . $contact . '/edit');
	}

}