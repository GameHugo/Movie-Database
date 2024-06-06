<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index()
    {
        $apiController = new MovieAPIController();
        return view('welcome',[
            'movies' => $apiController->getPopular()
        ]);
    }
}
