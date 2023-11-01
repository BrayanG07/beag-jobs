<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    use HasFactory;

    protected $casts = ['last_day' => 'date'];

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'company',
        'last_day',
        'description',
        'image',
        'user_id',
    ];

    // Esta función define una relación entre el modelo Vacant y el modelo Category.
    // Indica que una vacante pertenece a una categoría.
    public function category()
    {
        // La función belongsTo() establece una relación de "pertenece a".
        // En este caso, una vacante pertenece a una categoría.
        return $this->belongsTo(Category::class);
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    // Esta función define una relación entre el modelo Vacant y el modelo Candidate.
    // Indica que una vacante puede tener muchos candidatos.
    public function candidates()
    {
        // La función hasMany() establece una relación de "tiene muchos".
        // En este caso, una vacante puede tener muchos candidatos.
        return $this->hasMany(Candidate::class);
    }
}
