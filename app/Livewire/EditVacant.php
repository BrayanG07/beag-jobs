<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditVacant extends Component
{

    public int $vacant_id;
    public string $title;
    public int $salary;
    public int $category;
    public string $company;
    public string $last_day;
    public string $description;
    public string $image;
    public $new_image;

    use WithFileUploads;

    protected $rules = [
        'title' => ['required', 'string'],
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'new_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:1024'],
    ];

    /*
    * La función mount en Livewire se utiliza para realizar acciones antes de que el componente se renderice.
    * Es similar al método constructor en una clase PHP, o al método ngOnInit en Angular.
    * Aquí puedes realizar cualquier preparación que tu componente necesite antes de que se renderice.
    * Por ejemplo, podrías querer cargar algunos datos de la base de datos, o establecer algunos valores predeterminados para las propiedades del componente.
    */
    public function mount(Vacant $vacant)
    {
        $this->vacant_id = $vacant->id;
        $this->title = $vacant->title;
        $this->salary = $vacant->salary_id;
        $this->category = $vacant->category_id;
        $this->company = $vacant->company;
        $this->last_day = Carbon::parse($vacant->last_day)->format('Y-m-d');
        $this->description = $vacant->description;
        $this->image = $vacant->image;
    }

    public function editVacant()
    {
        $data = $this->validate();

        // Revisar si hay una nueva imagen
        if($this->new_image) {
            $imagen = $this->new_image->store('public/vacants');
            $data['image'] = str_replace('public/vacants/', '', $imagen);
        }

        // Encontrar la vacante a editar
        $vacant = Vacant::find($this->vacant_id);

        // Asignar los valores
        $vacant->title = $data['title'];
        $vacant->salary_id = $data['salary'];
        $vacant->category_id = $data['category'];
        $vacant->company = $data['company'];
        $vacant->last_day = $data['last_day'];
        $vacant->description = $data['description'];
        $vacant->image = $data['image'] ?? $vacant->image;

        // Guardar vacante
        $vacant->save();

        // Redireccionar
        session()->flash('message', 'Vacante actualizada con exito.');
        return redirect()->route('vacants.index');
    }

    public function render()
    {
        // Consultar base de datos
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-vacant', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
