<?php

namespace App\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class ViewOneVacant extends Component
{
    public Vacant $vacant;

    public function render()
    {
        return view('livewire.view-one-vacant');
    }
}
