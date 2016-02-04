<?php

use Illuminate\Database\Seeder;

class UbigeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::load(public_path() . '/rptUbigeo.xls', function($data) {
            $data->ignoreEmpty();

            $departamento = '00000';
            $depa_current = 1;
            $prov_current = 1;
            $dis_current = 1;
            $correlativo = -1;

            $provincia = '01000';
            $master_prov = '';
            $cell = 1;
            $result = [];
            foreach ($data->get() as $key => $sheet) {
                if ($sheet->departamento != null && $sheet->departamento != 'DEPARTAMENTO') {
                    $dep_id = trim(substr($sheet->departamento, 0, 3));
                    $dep_name = substr($sheet->departamento, 3, strlen($sheet->departamento) -3);

                    if ((int) $dep_id == $depa_current) {
                        $provincia = str_pad($dep_id, 5, '0', STR_PAD_RIGHT);
                        $result[] = ['codigo' => $dep_id, 'master' => $provincia, 'parent_id' => $departamento, 'nombre' => $dep_name];
                        $depa_current++;
                        $prov_current = 1;
                        $dis_current = 1;
                        $cell = 1;
                        $correlativo++;
                    }

                    if ($cell == 2) {
                        $prov_id = trim(substr($sheet->provincia, 0, 3));
                        $prov_name = substr($sheet->provincia, 3, strlen($sheet->provincia) -3);

                        if ((int) $prov_id == $prov_current) {
                            $master_prov = str_pad(($prov_id * 100) + $correlativo, 5, '0', STR_PAD_LEFT);
                            $result[] = ['codigo' => $prov_id, 'master' => $master_prov, 'parent_id' => $provincia, 'nombre' => $prov_name];
                            $prov_current++;
                        }
                    }

                    if ($cell == 3) {
                        $dis_id = trim(substr($sheet->distrito, 0, 3));
                        $dis_name = substr($sheet->distrito, 3, strlen($sheet->distrito) -3);

                        if ((int) $dis_id == $dis_current) {
                            $result[] = ['codigo' => $dis_id, 'master' => str_pad($dis_id, 5, '0', STR_PAD_LEFT), 'parent_id' => $master_prov, 'nombre' => $dis_name];
                            $dis_current++;
                        } else {
                            $dis_current = 1;

                            $prov_id = trim(substr($sheet->provincia, 0, 3));
                            $prov_name = substr($sheet->provincia, 3, strlen($sheet->provincia) -3);

                            if ((int) $prov_id == $prov_current) {
                                $master_prov = str_pad(($prov_id * 100) + $correlativo, 5, '0', STR_PAD_LEFT);
                                $result[] = ['codigo' => $prov_id, 'master' => $master_prov, 'parent_id' => $provincia, 'nombre' => $prov_name];
                                $prov_current++;
                            }
                            $cell = 2;
                        }
                    }

                    if ($cell != 3) {
                        $cell++;
                    }
                }
            }
            // print_r($result);
            // echo "<pre>";
            \DB::table('ubigeo')->insert($result);
            // echo "</pre>";
        });
    }
}
