<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class SearchVacants extends Component
{
    public $term;
    public $category;
    public $salary;

    public function readDataByForm()
    {
        // * Comunicandonos hacia el componente padre, (search) es un metodo del componente padre
        $this->dispatch('search', term: $this->term, category: $this->category, salary: $this->salary);
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.search-vacants', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
