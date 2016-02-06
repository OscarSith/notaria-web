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
                        <label class="control-label col-sm-2">Tipo Persona</label>
                        <div class="col-sm-2">
                            <select name="per_tipo" id="pro_tipo_per" class="form-control"></select>
                        </div>
                        <label class="control-label col-sm-2">Buscar por</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Razon Social">
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
