<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class CreateVacant extends Component
{
    public function render()
    {
        // Consultar base de datos
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacant', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
