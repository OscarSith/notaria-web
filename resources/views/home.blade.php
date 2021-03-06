@extends('layouts.master')

@section('content')
<div class="content">
    <div class="col-lg-12 text-center">
        <h2>
            Welcome to Homer Theme
        </h2>
    </div>
    <section class="row">
        <div class="col-sm-12">
            <div class="hpanel">
                <div class="panel-body">
                    {!! Form::open(['route' => 'addProtesto', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                    <h3 class="page-header">Solicita</h3>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <select name="per_tipo" id="pro_tipo_per" class="form-control pro_tipo_per js-source-states" style="width:100%"></select>
                        </div>
                        <div class="col-sm-2">
                            <select id="sol_per_dcmto_tipo" class="form-control per_dcmto_tipo js-source-states" name="per_dcmto_tipo" style="width:100%"></select>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="doc_num" placeholder="Número">
                        </div>
                        <label class="control-label col-sm-2">Buscar por</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control search-autocom" placeholder="Razon Social">
                            <input type="hidden" name="pro_solicita_per_id" id="pro_solicita_per_id">
                        </div>
                    </div>
                    <h3 class="page-header">Girador</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-1">RUC</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="doc_num_ruc" placeholder="Número de RUC">
                        </div>
                        <label class="control-label col-sm-2">Buscar por</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="Razon Social">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="control-label col-sm-2">Dirección</label>
                        <div class="col-sm-10">
                            <input type="text" name="gir_direccion" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Departamento</label>
                        <div class="col-sm-2">
                            <select id="gir_departamento" class="js-source-states departamento" data-destity="#gir_provincia" style="width: 100%" data-area="provincia">
                                <option>-Seleccione-</option>
                                @foreach ($departamentos as $departamento)
                                    <?php $selected = ''; ?>
                                    @if (isset($personaUbigeo))
                                        @if ($departamento->departamento == $personaUbigeo->departamento)
                                            <?php $selected = 'selected'; ?>
                                        @endif
                                    @endif
                                    <option value="{{ $departamento->master }}" {{ $selected }}>{{ $departamento->departamento }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="control-label col-sm-2">Provincia</label>
                        <div class="col-sm-2">
                            <select id="gir_provincia" class="js-source-states provincia" style="width: 100%" data-destity="#gir_distrito" data-area="distrito">
                                <option>-Seleccione-</option>
                            </select>
                        </div>
                        <label class="control-label col-sm-2">Distrito</label>
                        <div class="col-sm-2">
                            <select id="gir_distrito" class="js-source-states" name="per_ubg_id" style="width: 100%">
                                <option>-Seleccione-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gir_firma" class="control-label col-sm-2">Firma</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="gir_firma">
                        </div>
                    </div>
                    <h3 class="page-header">Documento</h3>
                    <div class="form-group">
                        <div class="col-sm-3">
                            {!! Form::text('pro_titulo', null, ['class' => 'form-control', 'placeholder' => 'Titulo', 'id' => 'pro_titulo', 'required']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('pro_dcmto_numero', null, ['class' => 'form-control', 'placeholder' => 'Número', 'id' => 'pro_dcmto_numero', 'required']) !!}
                        </div>
                        <div class="col-sm-3">
                            <select name="pro_moneda" id="pro_moneda" class="pro_moneda form-control js-source-states" style="width: 100%"></select>
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('pro_importe', null, ['class' => 'form-control', 'placeholder' => 'Importe', 'id' => 'pro_importe', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            {!! Form::text('pro_fe_dcmto_emite', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Fecha Letra',
                                'id' => 'pro_fe_dcmto_emite',
                                'data-provide' => "datepicker",
                                'data-date-format'=>"dd/mm/yyyy",
                                'required']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('pro_fe_dcmto_vence', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Vencimiento',
                                'id' => 'pro_fe_dcmto_vence',
                                'data-provide' => "datepicker",
                                'data-date-format' => "dd/mm/yyyy",
                                'required']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('pro_fe_ingreso', Carbon\Carbon::now()->format('d/m/Y'), [
                                'class' => 'form-control',
                                'id' => 'pro_fe_ingreso',
                                'data-provide' => "datepicker",
                                'data-date-format' => "dd/mm/yyyy",
                                'required']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('pro_fe_notificacion', null, [
                                'class' => 'form-control',
                                'placeholder' => 'F. Notificación',
                                'id' => 'pro_fe_notificacion',
                                'data-provide' => "datepicker",
                                'data-date-format' => "dd/mm/yyyy",
                                'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            {!! Form::text('pro_fe_constancia', null, [
                                'class' => 'form-control',
                                'placeholder' => 'F. Constancia',
                                'id' => 'pro_fe_constancia',
                                'data-provide' => "datepicker",
                                'data-date-format' => "dd/mm/yyyy",
                                'required']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('pro_num_ingreso', null, ['class' => 'form-control', 'id' => 'pro_num_ingreso', 'placeholder' => 'Número Ingreso']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('pro_num_acta', null, ['class' => 'form-control', 'id' => 'pro_num_acta', 'placeholder' => 'Número Acta']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('pro_num_instrumento', null, ['class' => 'form-control', 'id' => 'pro_num_instrumento', 'placeholder' => 'Número Instrumento']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            {!! Form::text('pro_clase', null, ['class' => 'form-control', 'id' => 'pro_clase', 'placeholder' => 'Clase']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('pro_modelo', null, ['class' => 'form-control', 'id' => 'pro_modelo', 'placeholder' => 'Modelo']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('pro_num_acta', null, ['class' => 'form-control', 'id' => 'pro_num_acta', 'placeholder' => 'Número Acta']) !!}
                        </div>
                    </div>
                    <h3 class="page-header">Acepta</h3>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <select name="per_tipo" id="ace_pro_tipo_per" class="form-control js-source-states pro_tipo_per" style="width:100%"></select>
                        </div>
                        <div class="col-sm-2">
                            <select id="ace_per_dcmto_tipo" class="form-control js-source-states per_dcmto_tipo" name="per_dcmto_tipo" style="width:100%"></select>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="ace_doc_num" placeholder="Número">
                        </div>
                        <label class="control-label col-sm-2">Buscar por</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Razon Social">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Departamento</label>
                        <div class="col-sm-2">
                            <select id="ace_departamento" class="js-source-states departamento" data-destity="#ace_provincia" style="width: 100%" data-area="provincia">
                                <option>-Seleccione-</option>
                                @foreach ($departamentos as $departamento)
                                    <?php $selected = ''; ?>
                                    @if (isset($personaUbigeo))
                                        @if ($departamento->departamento == $personaUbigeo->departamento)
                                            <?php $selected = 'selected'; ?>
                                        @endif
                                    @endif
                                    <option value="{{ $departamento->master }}" {{ $selected }}>{{ $departamento->departamento }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="control-label col-sm-2">Provincia</label>
                        <div class="col-sm-2">
                            <select id="ace_provincia" class="js-source-states provincia" style="width: 100%" data-destity="#ace_distrito" data-area="distrito">
                                <option>-Seleccione-</option>
                            </select>
                        </div>
                        <label class="control-label col-sm-2">Distrito</label>
                        <div class="col-sm-2">
                            <select id="ace_distrito" class="js-source-states" name="per_ubg_id" style="width: 100%">
                                <option>-Seleccione-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ace_firma" class="control-label col-sm-2">Firma</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ace_firma">
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection