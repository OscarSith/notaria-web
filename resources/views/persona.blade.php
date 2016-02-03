@extends('layouts.master')

@section('content')
	<div class="normalheader transition">
        <div class="hpanel">
            <div class="panel-body">
                <a class="small-header-action">
                    <div class="clip-header">
                        <i class="fa fa-arrow-up"></i>
                    </div>
                </a>
                <div class="pull-right" style="margin: 4px 20px 0 0">
					<a class="btn btn-primary" href="{{ route('add-persona') }}">Agregar</a>
				</div>
                <h2 class="font-light m-b-xs">PERSONAS</h2>
                <small>Administración y mantenimiento de personas.</small>
            </div>
        </div>
    </div>
    <div class="content">
    	<div class="row">
    		<div class="col-sm-12">
    			<div class="hpanel">
    				<div class="panel-body">
    					<div class="table-responsive">
    						<table class="table table-condensed table-striped">
    							<thead>
    								<tr>
    									<th>Nombres</th>
    									<th>Apellidos</th>
    									<th>Numero</th>
    									<th>Acciones</th>
    								</tr>
    							</thead>
    							<tbody>
    								@each('partials.personas-list', $personas, 'persona', 'partials.personas-list-empty')
    							</tbody>
    						</table>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
@endsection