<?php

namespace App\Livewire;

use App\Providers\MovieAPIServiceProvider;
use Livewire\Component;

class Search extends Component
{
    public $search = "";

    public function render()
    {
        $apiController = new MovieAPIServiceProvider();
        return view('livewire.search', [
            'searchMovies' => array_slice($apiController->search($this->search), 0, 10)
        ]);
    }
}
