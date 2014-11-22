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

        if (count($fetch) > 1)
        {

            $sentence = '';

            for ($i=0;$i<count($fetch);$i++)
            {
                $key = $i + 1;
                $sentence .= "For " . $fetch[$i]->firstname . " " . $fetch[$i]->lastname . ", press " . $key . ". ";

            }

            $twiml = new Services_Twilio_Twiml();

            $gather = $twiml->gather([
                'method' => 'GET',
                'action' => 'twilio/chosen-match?dial-profile=' . $digits,
                'numDigits' => 1
            ]);
            $gather->say(
                "The name you've entered has returned " . count($fetch) . " results. " . $sentence
            );

            return $twiml;


        } elseif (count($fetch) === 1) {

            $contact = $fetch[0];

            $spoken_num = implode(' ', str_split($contact->numbers[0]->number));

            $twiml = new Services_Twilio_Twiml;
            $twiml->say('Okay, I found your contact ' . $contact->firstname . ' ' . $contact->lastname . ' based on the digits you pressed!  I\'ll call them at ' . $spoken_num . '.');
            $twiml->dial('+1' . $contact->numbers[0]->number , [
                'callerId' => '+12025099421',
            ]);

            $response = Response::make($twiml, 200);
            $response->header('Content-Type', 'text/xml');
            return $response;

        } else {

            $twiml = new Services_Twilio_Twiml();

            $gather = $twiml->gather(['numDigits' => 50]);
            $gather->say("Sorry, I didn't find a contact based on the digits you pressed.  Please enter the name of the person you're trying to reach, followed by the pound sign.");

            return $twiml;
        }

    }

    public function chosenMatch()
    {

        $index = Input::get('Digits') - 1;
        $dial_profile = Input::get('dial-profile');

        $fetch = Contact::where('dial_profile', 'LIKE', $dial_profile .'%')->get();

        $contact = $fetch[$index];

        $spoken_num = implode(' ', str_split($contact->numbers[0]->number));

        $twiml = new Services_Twilio_Twiml;
        $twiml->say('Okay, I found your contact ' . $contact->firstname . ' ' . $contact->lastname . ' based on the digits you pressed!  I\'ll call them at ' . $spoken_num . '.');
        $twiml->dial('+1' . $contact->numbers[0]->number , [
            'callerId' => '+12025099421',
        ]);

        $response = Response::make($twiml, 200);
        $response->header('Content-Type', 'text/xml');
        return $response;

    }

}
