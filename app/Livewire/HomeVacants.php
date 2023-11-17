<?php

namespace App\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class HomeVacants extends Component
{
    public function render()
    {
        $vacants = Vacant::all();

        return view('livewire.home-vacants', [
            'vacants' => $vacants
        ]);
    }
}
