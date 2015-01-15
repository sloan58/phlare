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

        $gather = $twiml->gather([
            'method' => 'GET',
            'action' => 'twilio/check-account'
        ]);
        $gather->say("Hello, thanks for calling Phlare.  Please enter your account number, followed by the pound sign.");

        return $twiml;

	}

    public function checkAccount()
    {

        $twiml = new Services_Twilio_Twiml();

        $account_number = Input::get('Digits');

        $fetch = User::where('account_number', '=', $account_number)->get();

        if (count($fetch) === 1)
        {

            $user = $fetch[0];

            $gather = $twiml->gather([
            'method' => 'GET',
            'action' => 'auth-caller?account_number=' . $account_number,
            ]);

            $gather->say("Ok, I found your account, " . $user->firstname . ".  Please enter your PIN, followed by the pound sign.");

            return $twiml;

        } else {


            $gather = $twiml->gather([
                'method' => 'GET',
            ]);
            $gather->say("Sorry, I could not locate your account.  Please re-enter your account number, followed by the pound sign.");

            return $twiml;

        }

    }

    public function authCaller()
    {

        $pin = Input::get('Digits');

        $account_number = Input::get('account_number');

        $twiml = new Services_Twilio_Twiml();

        $fetch = User::where('account_number', $account_number)->where('pin', $pin)->get();

        if (count($fetch) === 1)
        {

            $user = $fetch[0];

            $gather = $twiml->gather([
                'method' => 'GET',
                'action' => 'find-contact?id=' . $user->id,
            ]);

            $twiml->redirect('find-contact?id=' . $user->id);

            $gather->say("Thank you.  Please type in the first and last name of the contact you'd like to reach.  You can press pound at any time and we'll find the contacts that match the digits you've pressed.");

            return $twiml;

        } else {

            $gather = $twiml->gather([
                'method' => 'GET',
                'action' => 'auth-caller?account_number=' . $account_number,
            ]);

            $gather->say("Sorry, the PIN you entered is incorrect.  Please re-enter your PIN, followed by the pound sign.");

            return $twiml;

        }

    }

    public function findContact()
    {

        $twiml = new Services_Twilio_Twiml();

        $digits = Input::get('Digits');
        $user_id = Input::get('id');


        if (!$digits) {

            $fetch = Contact::where('user_id',$user_id)->get();

        } else {

            $fetch = Contact::where('dial_profile', 'LIKE', $digits . '%')->where('user_id', $user_id)->get();

        }

        if (count($fetch) > 1)
        {

            $sentence = '';

            for ($i=0;$i<count($fetch);$i++)
            {
                $key = $i + 1;
                $sentence .= "For " . $fetch[$i]->firstname . " " . $fetch[$i]->lastname . ", press " . $key . ". ";

            }

            $gather = $twiml->gather([
                'method' => 'GET',
                'action' => 'chosen-match?dial-profile=' . $digits,
                'numDigits' => 1
            ]);
            $gather->say(
                "We found " . count($fetch) . " results. " . $sentence
            );

            return $twiml;


        } elseif (count($fetch) === 1) {

            $contact = $fetch[0];

            $spoken_num = implode(' ', str_split($contact->numbers[0]->number));

            $twiml->say('Okay, I found your contact ' . $contact->firstname . ' ' . $contact->lastname . '!  I\'ll call them at ' . $spoken_num . '.');
            $twiml->dial('+1' . $contact->numbers[0]->number , [
                'callerId' => '+12025099421',
            ]);

            $response = Response::make($twiml, 200);
            $response->header('Content-Type', 'text/xml');
            return $response;

        } else {

            $gather = $twiml->gather([
                'method' => 'GET',
                'action' => 'find-contact?id=' . $user_id
            ]);

            $twiml->redirect('find-contact?id=' . $user_id);

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
        $twiml->dial(
            '+1' . $contact->numbers[0]->number,
                [
                    'callerId' => '+12025099421'
                ]
        );

        $response = Response::make($twiml, 200);
        $response->header('Content-Type', 'text/xml');
        return $response;

    }

}
