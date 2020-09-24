<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchList extends Component
{
    public $search = "hei man";
    public function render()
    {
        return view('livewire.search-list');
    }
}
