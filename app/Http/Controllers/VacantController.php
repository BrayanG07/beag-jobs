<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Http\Request;

class VacantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Solo los reclutadores puedes ver el muro de sus vacantes
        $this->authorize('viewAny', Vacant::class); // Invocando el VacantPolicy
        return view('vacants.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aquí pasamos Vacant::class al método authorize porque estamos verificando un permiso a nivel de clase, no a nivel de instancia.
        // No necesitamos una instancia específica de Vacant para verificar si el usuario actual puede crear vacantes en general.
        // En otros casos, cuando necesitamos verificar permisos en una instancia específica de Vacant (por ejemplo, si el usuario puede editar o eliminar una vacante específica),
        // entonces pasaríamos una instancia de Vacant al método authorize.
        $this->authorize('create', Vacant::class);
        return view('vacants.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacant $vacant)
    {
        return view('vacants.show', [
            'vacant' => $vacant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacant $vacant)
    {
        // * Autoriza la actualización de la vacante solo si el usuario es la persona que la ha creado.
        $this->authorize('update', $vacant);

        return view('vacants.edit', [
            'vacant' => $vacant
        ]);
    }
}
