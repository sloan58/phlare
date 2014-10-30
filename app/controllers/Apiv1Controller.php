<?php

class Apiv1Controller extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function token()
	{

        $token = csrf_token();

        return $token;

	}

}
