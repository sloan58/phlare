<?php

class MainController extends BaseController {

    public function getIndex()
    {
        // Show the home page
        return View::make('site/index');
    }
}