<?php

class APIContactController extends \BaseController {


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        // Fetch the Request instance
        $request = Request::instance();

        // Get the content from it
        $content = $request->getContent();

        Log::info($content);
        var_dump($content);

        return $content;

	}

}
