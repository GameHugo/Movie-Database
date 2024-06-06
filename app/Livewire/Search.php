<?php

namespace App\Livewire;

use App\Http\Controllers\MovieAPIController;
use Livewire\Component;

class Search extends Component
{
    public $search = "";

    public function render()
    {
        $apiController = new MovieAPIController();
        return view('livewire.search', [
            'searchMovies' => array_slice($apiController->search($this->search), 0, 10)
        ]);
    }
}
