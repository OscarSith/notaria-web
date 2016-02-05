@extends('layouts.master')

@section('content')
	<div class="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="hpanel">
					<div class="panel-heading">
						<span>ACTUALIZAR PERSONA NATURAL – JURIDICA</span>
					</div>
					<div class="panel-body">
						{!! Form::model($persona, array('route' => ['update-persona', $persona->id], 'method' => 'put', 'class' => 'form-horizontal')) !!}
							@include ('partials.persona-form')
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button class="btn btn-success" id="btn-add-persona">Actualizar</button>
								</div>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection