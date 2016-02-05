<?php

use Illuminate\Database\Seeder;

class MasterOfTableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$values = [
    	// Tipo de Documento
    		[
	        	'ttb_tipo' => '0010',
	        	'ttb_arg' => '0001',
	        	'ttb_val1' => 'LIBRETA ELECTORAL O DNI',
	        	'ttb_val2' => 'L.E / DNI',
	        	'ttb_val3' => '01',
	        ],
	        [
	        	'ttb_tipo' => '0010',
	        	'ttb_arg' => '0002',
	        	'ttb_val1' => 'CARNET DE EXTRANJERIA',
	        	'ttb_val2' => 'CARNET EXT.',
	        	'ttb_val3' => '04',
	        ],
	        [
	        	'ttb_tipo' => '0010',
	        	'ttb_arg' => '0003',
	        	'ttb_val1' => 'REG. UNICO DE CONTRIBUYENTES',
	        	'ttb_val2' => 'RUC',
	        	'ttb_val3' => '06',
	        ],
	        [
	        	'ttb_tipo' => '0010',
	        	'ttb_arg' => '0004',
	        	'ttb_val1' => 'PASAPORTE',
	        	'ttb_val2' => 'PASAPORTE',
	        	'ttb_val3' => '07',
	        ],
	        [
	        	'ttb_tipo' => '0010',
	        	'ttb_arg' => '0005',
	        	'ttb_val1' => 'PART. DE NACIMIENTO-IDENTIDAD',
	        	'ttb_val2' => 'P. NAC.',
	        	'ttb_val3' => '11',
	        ],
	        [
	        	'ttb_tipo' => '0010',
	        	'ttb_arg' => '0006',
	        	'ttb_val1' => 'OTROS',
	        	'ttb_val2' => 'OTROS',
	        	'ttb_val3' => '00',
	        ],

	    // Sexo
	    	[
	        	'ttb_tipo' => '0020',
	        	'ttb_arg' => '0001',
	        	'ttb_val1' => 'MASCULINO',
	        	'ttb_val2' => 'M',
	        ],
	        [
	        	'ttb_tipo' => '0020',
	        	'ttb_arg' => '0002',
	        	'ttb_val1' => 'FEMENINO',
	        	'ttb_val2' => 'F',
	        ],

	    // Tipo de Persona
	    	[
	        	'ttb_tipo' => '0030',
	        	'ttb_arg' => '0001',
	        	'ttb_val1' => 'PERSONA NATURAL',
	        	'ttb_val2' => 'PN',
	        ],
	        [
	        	'ttb_tipo' => '0030',
	        	'ttb_arg' => '0002',
	        	'ttb_val1' => 'PERSONA JURIDICA',
	        	'ttb_val2' => 'PJ',
	        ],

	    // Tipo de nacionalidad
	    	[
	        	'ttb_tipo' => '0040',
	        	'ttb_arg' => '0001',
	        	'ttb_val1' => 'Peruano',
	        	'ttb_val2' => 'PER',
	        ],
	        [
	        	'ttb_tipo' => '0040',
	        	'ttb_arg' => '0002',
	        	'ttb_val1' => 'Extranjero',
	        	'ttb_val2' => 'EXT',
	        ],

	    // Moneda
	    	[
	        	'ttb_tipo' => '0050',
	        	'ttb_arg' => '0001',
	        	'ttb_val1' => 'Nuevo Sol',
	        	'ttb_val2' => 'PEN',
	        ],
	        [
	        	'ttb_tipo' => '0050',
	        	'ttb_arg' => '0002',
	        	'ttb_val1' => 'Dolar',
	        	'ttb_val2' => 'USD',
	        ],

	    // Tipo titulo
	    	[
	        	'ttb_tipo' => '0060',
	        	'ttb_arg' => '0001',
	        	'ttb_val1' => 'LETRA',
	        ],
	        [
	        	'ttb_tipo' => '0060',
	        	'ttb_arg' => '0002',
	        	'ttb_val1' => 'FACTURA',
	        ],
	        [
	        	'ttb_tipo' => '0060',
	        	'ttb_arg' => '0003',
	        	'ttb_val1' => 'PAGARÉ',
	        ],
	        [
	        	'ttb_tipo' => '0060',
	        	'ttb_arg' => '0004',
	        	'ttb_val1' => 'WARRANT',
	        ],

	    // Tipo clase
	    	[
	        	'ttb_tipo' => '0070',
	        	'ttb_arg' => '0001',
	        	'ttb_val1' => 'Con Aval',
	        ],
	        [
	        	'ttb_tipo' => '0070',
	        	'ttb_arg' => '0002',
	        	'ttb_val1' => 'Sin Aval',
	        ],

	    // Estado protesto
	    	[
	        	'ttb_tipo' => '0080',
	        	'ttb_arg' => '0001',
	        	'ttb_val1' => 'Protestado',
	        ],
	        [
	        	'ttb_tipo' => '0080',
	        	'ttb_arg' => '0002',
	        	'ttb_val1' => 'Levantado',
	        ],
	    ];

	    foreach ($values as $key) {
        	\DB::table('maestro_tabla')->insert($key);
	    }
    }
}
