<?php

namespace App\Http\Controllers;

use App\Providers\MovieAPIServiceProvider;

class PageController extends Controller
{
    public MovieAPIServiceProvider $apiController;
    public function __construct()
    {
        $this->apiController = new MovieAPIServiceProvider();
    }

    public function index()
    {
        return view('welcome',[
            'movies' => $this->apiController->getPopular()
        ]);
    }

    public function show($movieID)
    {
        return view('movie', [
            'movie' => $this->apiController->getMovie($movieID)
        ]);
    }
}
