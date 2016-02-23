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
                            <select name="per_tipo" id="pro_tipo_per" class="form-control pro_tipo_per"></select>
                        </div>
                        <div class="col-sm-2">
                            <select id="sol_per_dcmto_tipo" class="form-control per_dcmto_tipo" name="per_dcmto_tipo"></select>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="doc_num" placeholder="Número">
                        </div>
                        <label class="control-label col-sm-2">Buscar por</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Razon Social">
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
                            <input type="text" name="pro_titulo" id="pro_titulo" class="form-control" placeholder="Titulo">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="pro_dcmto_numero" id="pro_dcmto_numero" class="form-control" placeholder="Número">
                        </div>
                        <div class="col-sm-3">
                            <select name="pro_moneda" id="pro_moneda" class="pro_moneda form-control js-source-states" style="width: 100%"></select>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="pro_importe" id="pro_importe" class="form-control" placeholder="Importe">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" name="pro_fe_dcmto_emite" id="pro_fe_dcmto_emite" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Fecha Letra">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="pro_fe_dcmto_vence" id="pro_fe_dcmto_vence" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Vencimiento">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="pro_fe_ingreso" id="pro_fe_ingreso" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Ingreso" value="{{ Carbon\Carbon::now()->format('d/m/Y')}}">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="pro_fe_notificacion" id="pro_fe_notificacion" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="F. Notificación">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" name="pro_fe_constancia" id="pro_fe_constancia" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="F. Constancia">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="pro_num_ingreso" id="pro_num_ingreso" class="form-control" placeholder="Número Ingreso">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="pro_num_acta" id="pro_num_acta" class="form-control" placeholder="Número Acta">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="pro_num_instrumento" id="pro_num_instrumento" class="form-control" placeholder="Número Instrumento">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" name="pro_clase" id="pro_clase" class="form-control" placeholder="Clase">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="pro_modelo" id="pro_modelo" class="form-control" placeholder="Modelo">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="pro_num_acta" id="pro_num_acta" class="form-control" placeholder="Número Acta">
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
