<?php

class TwilioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function answer()
	{

        $twiml = new Services_Twilio_Twiml();

        $gather = $twiml->gather(['numDigits' => 50]);
        $gather->say("Hello Caller, please enter the name of the person you're trying to reach, followed by the pound sign.");

        return $twiml;

	}

    public function findContact()
    {

        $digits = Input::get('Digits');

        $fetch = Contact::where('dial_profile', 'LIKE', $digits .'%')->get();

        $contact = $fetch[0];

        $spoken_num = implode(' ', str_split($contact->number));

        $twiml = new Services_Twilio_Twiml;
        $twiml->say('Okay, I found your contact ' . $contact->name . ' based on the digits you pressed!  I\'ll call them at ' . $spoken_num . '.');
        $twiml->dial('+1' . $contact->number , array(
            'callerId' => '+12025099421',
        ));

        $response = Response::make($twiml, 200);
        $response->header('Content-Type', 'text/xml');
        return $response;

    }

}
