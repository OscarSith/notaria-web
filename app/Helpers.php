<?php
namespace App;

class Helpers
{
	static public function getMasterOfTable()
	{
		return \DB::table('maestro_tabla')->where('ttb_estado', 1)->get([
			'ttb_arg',
			'ttb_tipo',
			'ttb_val1',
		]);
	}
}