<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PersonaRepo;
use App\Entities\Ubigeo;

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
        return view('persona', compact('personas'));
    }

    public function create()
    {
        $departamentos = Ubigeo::getByParentId('00000');
        return view('persona-create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        if ($this->personaRepo->add($request->all(), \Auth::user()->id)) {
            return redirect()->route('persona')->with(['success_message' => 'Persona agregada con exito.']);
        }

        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $persona = $this->personaRepo->getById($id);
        $departamentos = Ubigeo::getByParentId('00000');
        return view('persona-edit', ['persona' => $persona, 'departamentos' => $departamentos]);
    }

    public function ubigeo(Request $request, $parent_id)
    {
        $departamentos = Ubigeo::getByParentId($parent_id);

        return response()->json($departamentos);
    }
}
