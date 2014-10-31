<?php

class TokenController extends \BaseController {

	/**
	 * Create a CSRF Token.
	 *
	 * @return Response
	 */
	public function create()
	{

        $token = csrf_token();

        return $token;

	}

}
