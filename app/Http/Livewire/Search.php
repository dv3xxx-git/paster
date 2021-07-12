<?php

namespace App\Http\Livewire;

use App\Models\Paste;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm;
    public $pastes;
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->pastes = Paste::where('name', 'like', $searchTerm)->get();
        return view('livewire.search');
    }
}
