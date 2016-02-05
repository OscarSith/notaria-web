<div class="form-group">
	<label class="control-label col-sm-2">Tipo Persona</label>
	<div class="col-sm-6" id="per_tipo" {{ isset($persona) ? "data-tipoper=$persona->per_tipo" : ''}}></div>
</div>
<div class="hr-line-dashed"></div>
<!-- Natural -->
<div id="per-natural-controls" class="hidden">
	<div class="form-group">
		<label class="control-label col-sm-2">Nacionalidad</label>
		<div class="col-sm-2">
			<select name="per_nacion" id="per_nacion" class="form-control" disabled {{ isset($persona) ? "data-nacion=$persona->per_nacion" : ''}}></select>
		</div>
		<label class="control-label col-sm-2">Documento</label>
		<div class="col-sm-3">
			<select name="per_dcmto_tipo" id="per_dcmto_tipo" class="form-control" disabled {{ isset($persona) ? "data-tipodoc=$persona->per_dcmto_tipo" : ''}}></select>
		</div>
		<div class="col-sm-3">
			{!! Form::text('per_dcmto_numero', null, ['class' => 'form-control', 'disabled']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Primer nombre</label>
		<div class="col-sm-4">
			{!! Form::text('per_nombre1', null, ['class' => 'form-control', 'disabled']) !!}
		</div>
		<label class="control-label col-sm-2">Segundo nombre</label>
		<div class="col-sm-4">
			{!! Form::text('per_nombre2', null, ['class' => 'form-control', 'disabled']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Apellido Paterno</label>
		<div class="col-sm-4">
			{!! Form::text('per_ape_paterno', null, ['class' => 'form-control', 'disabled']) !!}
		</div>
		<label class="control-label col-sm-2">Apellido Materno</label>
		<div class="col-sm-4">
			{!! Form::text('per_ape_materno', null, ['class' => 'form-control', 'disabled']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Nacimiento</label>
		<div class="col-sm-2">
			{!! Form::text('per_fe_naci', null, ['class' => 'form-control', 'data-provide' => 'datepicker', 'data-date-format' => 'yyyy-mm-dd', 'disabled']) !!}
		</div>
		<label class="control-label col-sm-2">Sexo</label>
		<div class="col-sm-2">
			<select name="per_sexo" id="per_sexo" class="form-control" disabled {{ isset($persona) ? "data-sexo=$persona->per_sexo" : ''}}></select>
		</div>
	</div>
</div>
<!-- Juridica-->
<div id="per-juridico-controls" class="hidden">
	<div class="form-group">
		<label for="" class="control-label col-sm-2">Razón Social</label>
		<div class="col-sm-10">
			{!! Form::text('per_razon_social', null, ['class' => 'form-control', 'disabled']) !!}
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-sm-2">RUC</label>
		<div class="col-sm-2">
			{!! Form::text('per_ruc', null, ['class' => 'form-control', 'disabled']) !!}
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
		<select id="distrito" class="form-control" name="per_ubg_id">
			<option>-Seleccione-</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-2">Dirección</label>
	<div class="col-sm-10">
		{!! Form::text('per_direccion', null, ['class' => 'form-control']) !!}
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-2">Referencia</label>
	<div class="col-sm-10">
		{!! Form::text('per_direc_referencia', null, ['class' => 'form-control']) !!}
	</div>
</div>
<div class="hr-line-dashed"></div>