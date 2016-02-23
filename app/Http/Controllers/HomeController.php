<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers;
use App\Entities\Ubigeo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $departamentos = Ubigeo::getByParentId('00000');
        return view('home', compact('departamentos'));
    }

    public function getMasterOfTables()
    {
        return Helpers::getMasterOfTable();
    }
}
