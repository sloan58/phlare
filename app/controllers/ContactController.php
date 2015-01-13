<?php

class ContactController extends \BaseController {

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Inject the models.
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct();

        $this->user = $user;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        // Get current user and check permission
        $user = $this->user->currentUser();

        //get all the contacts
        if ($user->hasRole('admin') == 'admin') {

            $contacts = Contact::all();

            foreach ($contacts as $k => $v)
            {

                $user = User::find($v->user_id);

                $v->username = $user->username;

            }

            return View::make('contacts.index')
                ->with('contacts', $contacts);

        // get just the users contacts
        } else {

            // load the view and pass the contacts
            return View::make('contacts.index')
                ->with('user', $user);

        }

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('contacts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // Get current user
        $user = $this->user->currentUser();
        
        // validate
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('contacts/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            // store

            $name = Input::get('firstname') . Input::get('lastname');

            foreach (str_split($name) as $i)
            {
                $profile[] = DB::table('keymaps')->where('letter',strtoupper($i))->pluck('number');
            }

            $dial_profile = implode($profile);

            $contact = Contact::create([

                'firstname' => Input::get('firstname'),
                'lastname' => Input::get('lastname'),
                'dial_profile' => $dial_profile,
                'user_id' => $user->id,

            ]);

            Number::create([
                'number' => Input::get('number'),
                'label' => Input::get('label'),
                'contact_id' => $contact->id
            ]);

            // redirect
            Session::flash('message', 'Successfully created contact!');
            return Redirect::to('contacts');
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        // get the contact
        $contact = Contact::find($id);

        // show the view and pass the contact to it
        return View::make('contacts.show')
            ->with('contact', $contact);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        // get the contact
        $contact = Contact::find($id);

        // show the edit form and pass the contact
        return View::make('contacts.edit')
            ->with('contact', $contact);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        // validate
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('contacts/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $contact = Contact::find($id);
            $contact->firstname = Input::get('firstname');
            $contact->lastname = Input::get('lastname');
            $name = $contact->firstname . $contact->lastname;

            foreach (str_split($name) as $i)
            {
                $profile[] = DB::table('keymaps')->where('letter',strtoupper($i))->pluck('number');
            }

            $dial_profile = implode($profile);

            $contact->dial_profile = $dial_profile;

            $contact->save();

            // redirect
            Session::flash('message', 'Successfully updated contact!');
            return Redirect::to('contacts');
        }
}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        // delete
        $contact = Contact::find($id);
        $contact->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the contact!');
        return Redirect::to('contacts');
	}


}
