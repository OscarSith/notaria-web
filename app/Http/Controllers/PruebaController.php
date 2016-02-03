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
            $data = $reader->take(108);

            $departamento = '00000';
            $depa_current = 1;
            $prov_current = 1;
            $dis_current = 1;

            $provincia = '01000';
            $cell = 1;
        	$result = [];
        	echo "<pre>";

            foreach ($data->get() as $key => $sheet) {
                if ($sheet->departamento != null) {
                    $dep_id = trim(substr($sheet->departamento, 0, 3));
                    $dep_name = substr($sheet->departamento, 3, strlen($sheet->departamento) -3);

                    if ((int) $dep_id == $depa_current) {
                        $provincia = str_pad($dep_id, 5, '0', STR_PAD_RIGHT);
                        $result[] = ['codigo' => $dep_id, 'master' => $provincia, 'parent_id' => $departamento, 'nombre' => $dep_name];
                        $depa_current++;
                        $prov_current = 1;
                        $dis_current = 1;
                        $cell = 1;
                    }

                    if ($cell == 2) {
                        $prov_id = trim(substr($sheet->provincia, 0, 3));
                        $prov_name = substr($sheet->provincia, 3, strlen($sheet->provincia) -3);

                        if ((int) $prov_id == $prov_current) {
                            $result[] = ['codigo' => $prov_id, 'master' => str_pad($prov_id, 5, '0', STR_PAD_BOTH), 'parent_id' => $provincia, 'nombre' => $prov_name];
                            $prov_current++;
                        }
                    }

                    if ($cell == 3) {
                        $dis_id = trim(substr($sheet->distrito, 0, 3));
                        $dis_name = substr($sheet->distrito, 3, strlen($sheet->distrito) -3);

                        if ((int) $dis_id == $dis_current) {
                            $result[] = ['codigo' => $dis_id, 'master' => str_pad($dis_id, 5, '0', STR_PAD_LEFT), 'parent_id' => str_pad($prov_id, 5, '0', STR_PAD_BOTH), 'nombre' => $dis_name];
                            $dis_current++;
                        } else {
                            $dis_current = 1;

                            $prov_id = trim(substr($sheet->provincia, 0, 3));
                            $prov_name = substr($sheet->provincia, 3, strlen($sheet->provincia) -3);

                            if ((int) $prov_id == $prov_current) {
                                $result[] = ['codigo' => $prov_id, 'master' => str_pad($prov_id, 5, '0', STR_PAD_BOTH), 'parent_id' => $provincia, 'nombre' => $prov_name];
                                $prov_current++;
                            }
                            $cell = 2;
                        }
                    }
                    // var_dump($sheet);
                    if ($cell != 3) {
                        $cell++;
                    }
                    // echo "<br><br>";
                }
            }
        	print_r($result);
            $rs = \DB::table('ubigeo')->insert($result);
            var_dump($rs);
        	echo "</pre>";
        });
    }
}
