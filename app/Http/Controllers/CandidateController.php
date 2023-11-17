<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(Vacant $vacant)
    {
        return view('candidates.index', [
            'vacant' => $vacant,
        ]);
    }
}
