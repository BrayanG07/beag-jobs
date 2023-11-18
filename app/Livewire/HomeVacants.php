<?php

namespace App\Livewire;

use App\Models\Vacant;
use Livewire\Attributes\On;
use Livewire\Component;

class HomeVacants extends Component
{
    public $term;
    public $category;
    public $salary;

    #[On('search')]
    public function search($term, $category, $salary)
    {
        $this->term = $term ? $term : null;
        $this->category = $category ? $category : null;
        $this->salary = $salary ? $salary : null;
    }

    public function render()
    {
        // ? when se utiliza para filtrar cuando $this->term tenga un valor
        // ? si no tiene un valor, entonces muestra 20 vacantes por defecto y sin ningun filtro
        $vacants = Vacant::when($this->term, function($query) {
            $query->where('title', 'LIKE', '%' . $this->term . '%');
        })
        ->when($this->term, function($query) {
            $query->orWhere('company', 'LIKE', '%' . $this->term . '%');
        })
        ->when($this->category, function($query) {
            $query->where('category_id', $this->category);
        })
        ->when($this->salary, function($query) {
            $query->where('salary_id', $this->salary);
        })->paginate(20);

        return view('livewire.home-vacants', [
            'vacants' => $vacants
        ]);
    }
}
