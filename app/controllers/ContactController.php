<?php

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        // get all the contacts
        if (Auth::user()->username == 'admin') {

            $contacts = Contact::all();

        // get just the users contacts
        } else {

            $contacts = Auth::user()->contacts;

        }

        // load the view and pass the nerds
        return View::make('contacts.index')
            ->with('contacts', $contacts);
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
        // validate
        $rules = [
            'name' => 'required',
            'number' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('contacts/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $contact = new Contact;
            $contact->name = Input::get('name');
            $contact->number = Input::get('number');
            $contact->user_id = Auth::user()->id;

            foreach (str_split($contact->name) as $i)
            {
                $profile[] = DB::table('keymaps')->where('letter',$i)->pluck('number');
            }

            $dial_profile = implode($profile);

//            dd($dial_profile);

            $contact->dial_profile = $dial_profile;
            $contact->save();

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
        // get the nerd
        $contact = Contact::find($id);

        // show the view and pass the nerd to it
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
        // get the nerd
        $contact = Contact::find($id);

        // show the edit form and pass the nerd
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
            'name' => 'required',
            'number' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('contacts/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $nerd = Contact::find($id);
            $nerd->name = Input::get('name');
            $nerd->number = Input::get('number');
            $nerd->dial_profile = Input::get('dial_profile');
            $nerd->save();

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
        $nerd = Contact::find($id);
        $nerd->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the contact!');
        return Redirect::to('contacts');
	}


}
