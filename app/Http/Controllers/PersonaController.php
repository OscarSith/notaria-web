<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PersonaRepo;

class PersonaController extends Controller
{
    protected $personaRepo;

    public function __construct()
    {
        $this->personaRepo = new PersonaRepo();
    }
    /**
     * Show the page Persona.
     *
     * @return Response
     */
    public function index()
    {
        $personas = $this->personaRepo->getAll();
     //    dd($personas->first()->full_name . ' ' . $personas->first()->full_lastname);
    	// dd($personas);
        return view('persona', compact('personas'));
    }

    public function create()
    {
        return view('persona-create');
    }
}
