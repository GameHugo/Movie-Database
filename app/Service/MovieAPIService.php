<?php

namespace App\Service;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class MovieAPIService
{
    private string $API_TOKEN;

    private PendingRequest $client;

    public function __construct()
    {
        $this->API_TOKEN = env('MOVIE_API_TOKEN');
        $this->client = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->API_TOKEN,
            'accept' => 'application/json',
        ])->baseUrl("https://api.themoviedb.org/3/");
    }

    public function authentication(): bool
    {
        $response = $this->client->get('authentication');

        if ($response->getStatusCode() == 200) {
            return true;
        } else {
            return false;
        }
    }

    public function getPopular()
    {
        $response = $this->client->get('movie/popular?language=en-US&page=1');

        return $this->responseToArray($response);
    }

    public function search($query)
    {
        if ($query == null) {
            return [];
        }

        $response = $this->client->get('search/movie?query=' . $query);

        return $this->responseToArray($response);
    }

    public function getMovie($movieID)
    {
        if ($movieID == null) {
            return null;
        }
        return json_decode($this->client->get('movie/' . $movieID)->getBody()->getContents());
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
}
