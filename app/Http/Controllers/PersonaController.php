<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PersonaRequest;
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

    public function store(PersonaRequest $request)
    {
        if ($this->personaRepo->add($request->all(), \Auth::user()->id)) {
            return redirect()->route('persona')->with(['success_message' => 'Persona agregada con exito.']);
        }

        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $persona = $this->personaRepo->getById($id);
        $personaUbigeo = Ubigeo::find($persona->per_ubg_id, [
            'codigo', 'parent_id', 'departamento', 'provincia', 'distrito'
        ]);
        $departamentos = Ubigeo::getByParentId('00000');
        $provincias = Ubigeo::getByParentId($personaUbigeo->parent_id);
        return view('persona-edit', [
            'persona' => $persona,
            'departamentos' => $departamentos,
            'provincias' => $provincias,
            'personaUbigeo' => $personaUbigeo
        ]);
    }

    public function update(Request $request, $id)
    {
        if ($this->personaRepo->edit($request->all(), $id)) {
            return redirect()->route('persona')->with(['success_message' => 'Persona editada con exito.']);
        }

        return redirect()->back();
    }

    public function ubigeo(Request $request, $parent_id)
    {
        $departamentos = Ubigeo::getByParentId($parent_id);

        return response()->json($departamentos);
    }

    public function autocomplete(Request $request)
    {
        $result = $this->personaRepo->search($request->input('per_tipo'), $request->input('per_dcmto_tipo'), $request->input('query'));
        return response()->json(['suggestions' => $result]);
    }
}
