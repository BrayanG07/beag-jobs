<?php

namespace App\Livewire;

use App\Models\Vacant;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewVacants extends Component
{
    // Vacant $vacant = gracias al route model binding automaticamente obtiene todo el objeto vacante, simplemente recibiendo el id(Vacant)
    #[On('deleteVacant')]
    public function deleteVacant(Vacant $vacant)
    {
        $vacant->delete();
    }

    public function render()
    {
        $vacants = Vacant::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.view-vacants', [
            'vacants' => $vacants
        ]);
    }
}
