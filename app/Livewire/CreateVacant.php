<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVacant extends Component
{

    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;

    use WithFileUploads;

    // $rules = por convencion debe llamarse asi
    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
    ];

    public function createVacant()
    {
        // Por defecto esta funcion validate buscar las $rules
        $values = $this->validate();

        // * Almacenar la imagen
        $imageCreated = $this->image->store('public/vacants');
        
        // Este código utiliza la función str_replace para eliminar la cadena 'public/vacants/' de la variable $imageCreated y asignar el resultado a la variable $nameImage el cual sera un espacio vacio y por lo tanto unicamente almacenara el nombre de la imagen.
        $values['image'] = str_replace('public/vacants/', '', $imageCreated);

        // * Crear la vacante
        Vacant::create([
            'title' => $values['title'],
            'salary_id' => $values['salary'],
            'category_id' => $values['category'],
            'company' => $values['company'],
            'last_day' => $values['last_day'],
            'description' => $values['description'],
            'image' => $values['image'],
            'user_id' => auth()->user()->id, 
        ]);

        // * Crear un mensaje
        session()->flash('message', 'Vacante publicada con exito.');

        // * Redireccionar al usuario
        return redirect()->route('vacants.index');
    }

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
