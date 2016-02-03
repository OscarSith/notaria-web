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
            $reader->ignoreEmpty();
            $data = $reader->take(7);
            $departamento = '00000';
            $depa_current = 1;
            $prov_current = 1;
            $dis_current = 1;
            $is_first = true;

            $provincia = '00100';
            $cell = 1;
        	$result = [];
        	echo "<pre>";

            foreach ($data->get() as $key => $sheet) {
                $dep_id = trim(substr($sheet->departamento, 0, 3));
                $dep_name = substr($sheet->departamento, 3, strlen($sheet->departamento) -3);

                if ((int) $dep_id == $depa_current) {
                    $result[] = ['master' => str_pad($dep_id, 5, '0', STR_PAD_RIGHT), 'parent_id' => $departamento, 'nombre' => $dep_name];
                    $depa_current++;
                }

                if ($cell == 2) {
                    $prov_id = trim(substr($sheet->provincia, 0, 3));
                    $prov_name = substr($sheet->provincia, 3, strlen($sheet->provincia) -3);

                    if ((int) $prov_id == $prov_current) {
                        $result[] = ['master' => str_pad($prov_id, 5, '0', STR_PAD_RIGHT), 'parent_id' => $departamento, 'nombre' => $prov_name];
                        $prov_current++;
                    }
                }

                if ($cell == 3) {
                    $dis_id = (int) trim(substr($sheet->distrito, 0, 3));
                    $dis_name = substr($sheet->distrito, 3, strlen($sheet->distrito) -3);

                    if ($dis_id == $dis_current) {
                        $result[] = ['master' => $departamento, 'parent_id' => $departamento, 'nombre' => $dis_name];
                        $dis_current++;
                    }
                }
                var_dump($sheet);
                var_dump('celda: ' . $cell);
                if ($cell == 3) {
                    $cell = 0;
                }
                echo "<br><br>";
                $cell++;
            }
            // $data->each(function($sheet) use ($depa_current, $departamento, $cell){


            //     // if (condition) {
            //     //     # code...
            //     // }

            // });
        	print_r($result);
        	echo "</pre>";
        });
    }
}
