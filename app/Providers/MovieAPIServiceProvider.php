<?php

namespace App\Providers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class MovieAPIServiceProvider extends Controller
{
    private string $API_TOKEN;

    private Client $client;

    public function __construct()
    {
        $this->API_TOKEN = env('MOVIE_API_TOKEN');
        $this->client = new Client();
    }

    public function authentication(): bool
    {
        $response = $this->getRequest('authentication');

        if ($response->getStatusCode() == 200) {
            return true;
        } else {
            return false;
        }
    }

    public function getPopular()
    {
        $response = $this->getRequest('movie/popular?language=en-US&page=1');

        return $this->responseToArray($response);
    }

    public function search($query)
    {
        if ($query == null) {
            return [];
        }

        $response = $this->getRequest('search/movie?query=' . $query);

        return $this->responseToArray($response);
    }

    public function getMovie($movieID)
    {
        if ($movieID == null) {
            return null;
        }
        return json_decode($this->getRequest('movie/' . $movieID)->getBody()->getContents());
    }

    public function responseToArray($response)
    {
        if ($response->getStatusCode() != 200) {
            return null;
        }
        $response = json_decode($response->getBody()->getContents());
        $items = [];
        foreach ($response->results as $movie) {
            $items[] = $movie;
        }
        return $items;
    }

    public function getRequest($uri)
    {
        return $this->client->request('GET', 'https://api.themoviedb.org/3/' . $uri, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->API_TOKEN,
                'accept' => 'application/json',
            ],
        ]);
    }
}
