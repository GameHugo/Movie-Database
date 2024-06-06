<?php

namespace App\Livewire;

use App\Service\MovieAPIService;
use Livewire\Component;

class Search extends Component
{
    public $search = "";

    public function render()
    {
        $apiController = new MovieAPIService();
        return view('livewire.search', [
            'searchMovies' => array_slice($apiController->search($this->search), 0, 10)
        ]);
    }
}
