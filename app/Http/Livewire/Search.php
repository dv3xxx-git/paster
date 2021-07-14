<?php

namespace App\Http\Livewire;

use App\Models\Paste;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm;
    public $pastes;
    public function render()
    {

        $searchTerm = '%' . $this->searchTerm . '%';
        
        if (Auth::user())
            $checker = 'true';
        else
            $checker = 'false';

        $this->pastes = Paste::where(function ($query) use ($checker) {
            $query->whereAcceptTimer(0)
                ->whereAcceptPublic(0)->orWhere(function ($query) use ($checker) {
                    $query->when($checker == 'true', function ($query) {
                        $query->whereUserId(Auth::user()->id)->whereAcceptPublic(2);
                    });
                });
        })
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', $searchTerm)
                    ->orWhere('text', 'like', $searchTerm);
            })
            ->get();

        return view('livewire.search');
    }
}
