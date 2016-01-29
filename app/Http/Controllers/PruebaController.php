<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;

class PruebaController extends Controller
{
    public function ubigeo()
    {
        Excel::load('rptUbigeo.xls', function($reader) {
        	$data = $reader->take(20);
        	$departamento = '00000';
        	$result = [];
        	$data->each(function($sheet) {
        		$result[] = $sheet->toArray();
        	});
        		// $sheet->each(function($row) {
	        	// 	print_r($row);
	        	// 	echo "<br>";
        	echo "<pre>";
        	print_r($result);
        	echo "</pre>";
        });
    }
}
