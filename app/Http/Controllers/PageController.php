<?php

namespace App\Http\Controllers;

use App\Service\MovieAPIService;

class PageController extends Controller
{
    public MovieAPIService $apiController;
    public function __construct()
    {
        $this->apiController = new MovieAPIService();
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
