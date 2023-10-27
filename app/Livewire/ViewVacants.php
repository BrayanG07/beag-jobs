<?php

namespace App\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class ViewVacants extends Component
{
    public function render()
    {
        $vacants = Vacant::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.view-vacants', [
            'vacants' => $vacants
        ]);
    }
}
