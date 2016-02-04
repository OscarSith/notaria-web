@extends('layouts.master')

@section('content')
	<div class="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="hpanel">
					<div class="panel-heading">
						<span>REGISTRAR PERSONA NATURAL – JURIDICA</span>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-sm-2">Tipo Persona</label>
								<div class="col-sm-6" id="per_tipo"></div>
							</div>
							<div class="hr-line-dashed"></div>
							<!-- Natural -->
							<div id="per-natural-controls" class="none">
								<div class="form-group">
									<label class="control-label col-sm-2">Nacionalidad</label>
									<div class="col-sm-2">
										<select name="per_nacion" id="per_nacion" class="form-control" disabled></select>
									</div>
									<label class="control-label col-sm-2">Documento</label>
									<div class="col-sm-3">
										<select name="per_dcmto_tipo" id="per_dcmto_tipo" class="form-control" disabled></select>
									</div>
									<div class="col-sm-3">
										<input type="text" name="per_dcmto_numero" class="form-control" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2">Primer nombre</label>
									<div class="col-sm-4">
										<input type="text" name="per_nombre1" class="form-control" disabled>
									</div>
									<label class="control-label col-sm-2">Segundo nombre</label>
									<div class="col-sm-4">
										<input type="text" name="per_nombre2" class="form-control" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2">Apellido Paterno</label>
									<div class="col-sm-4">
										<input type="text" name="per_ape_paterno" class="form-control" disabled>
									</div>
									<label class="control-label col-sm-2">Apellido Materno</label>
									<div class="col-sm-4">
										<input type="text" name="per_ape_materno" class="form-control" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2">Nacimiento</label>
									<div class="col-sm-2">
										<input type="text" name="per_fe_naci" data-provide="datepicker" class="form-control" disabled>
									</div>
									<label class="control-label col-sm-2">Sexo</label>
									<div class="col-sm-2">
										<select name="per_sexo" id="per_sexo" class="form-control" disabled></select>
									</div>
								</div>
							</div>
							<!-- Juridica-->
							<div id="per-juridico-controls" class="none">
								<div class="form-group">
									<label for="" class="control-label col-sm-2">Razón Social</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="per_razon_social" disabled>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="control-label col-sm-2">RUC</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="per_ruc" disabled>
									</div>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="control-label col-sm-2">Departamento</label>
								<div class="col-sm-2">
									<select id="departamento" class="form-control" data-destity="#provincia">
										<option>-Seleccione-</option>
										@foreach ($departamentos as $departamento)
											<option value="{{ $departamento->master }}">{{ $departamento->nombre }}</option>
										@endforeach
									</select>
								</div>
								<label class="control-label col-sm-2">Provincia</label>
								<div class="col-sm-2">
									<select id="provincia" class="form-control" data-destity="#distrito">
										<option>-Seleccione-</option>
									</select>
								</div>
								<label class="control-label col-sm-2">Distrito</label>
								<div class="col-sm-2">
									<select id="distrito" class="form-control">
										<option>-Seleccione-</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Dirección</label>
								<div class="col-sm-10">
									<input type="text" name="per_direccion" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Referencia</label>
								<div class="col-sm-10">
									<input type="text" name="per_direc_referencia" class="form-control">
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button class="btn btn-success" disabled>Agregar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection