<?php

namespace App\Livewire;

use App\Models\Vacant;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ApplyVacancy extends Component
{

    use WithFileUploads;
    public $cv;
    public Vacant $vacant;

    protected $rules = [
        "cv" => ["required", "mimes:pdf"],
    ];

    public function mount(Vacant $vacant)
    {
        $this->$vacant = $vacant;
    }

    public function storeApplyVacancy()
    {
        $values = $this->validate();

        // Almacenar CV en el disco duro
        $cvFile = $this->cv->store('public/cv');
        
        // Este código utiliza la función str_replace para eliminar la cadena 'public/vacants/' de la variable $imageCreated y asignar el resultado a la variable $nameImage el cual sera un espacio vacio y por lo tanto unicamente almacenara el nombre de la imagen.
        $values['cv'] = str_replace('public/cv/', '', $cvFile);

        // Crear la candidato a la vacante
        $this->vacant->candidates()->create([
            'user_id' => auth()->user()->id,
            'cv' => $values['cv'],  
        ]);

        // Crear notificacion y enviar email

        // Print message success
        session()->flash('message', 'Se envió correctamente tu información, mucha suerte');
        return redirect()->back(); // Lo devolvemos a la pagina anterior
    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
