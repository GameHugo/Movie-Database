<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MovieAPIController extends Controller
{
    private string $API_TOKEN;

    public function __construct()
    {
        $this->API_TOKEN = env('MOVIE_API_TOKEN');
    }

    public function authentication(): bool
    {
        $client = new Client();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/authentication', [
            'headers' => [
                'Authorization' => 'Bearer '.$this->API_TOKEN,
                'accept' => 'application/json',
            ],
        ]);

        if($response->getStatusCode() == 200) {
            return true;
        } else {
            return false;
        }
    }

    public function getPopular()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?language=en-US&page=1', [
            'headers' => [
                'Authorization' => 'Bearer '.$this->API_TOKEN,
                'accept' => 'application/json',
            ],
        ]);

        if($response->getStatusCode() != 200) {
            // TODO: error logging
            dd("something went wrong");
        }
        $response = json_decode($response->getBody()->getContents());
        $movies = [];
        foreach ($response->results as $movie) {
            $movies[] = $movie;
        }
        return $movies;
    }
}
