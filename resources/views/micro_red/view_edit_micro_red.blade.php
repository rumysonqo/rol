@extends('admin.layout')

@section('titulo')
EDITAR MICRO RED
@endsection

@section('descripcion')
Edita datos de Micro Red
@endsection


@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-6">


			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div style="width: 100%;" class="panel panel-primary">
				<div class="panel-heading">
					<h1 class="panel-title">Modificar Micro Red</h1>
				</div>
				<div class="panel-body">					
					{{ Form::open(['route'=>['micro_red.update', $micro_red->id], 'method'=>'POST']) }} 

						<input name="_method" type="hidden" value="PATCH">
						<div class="form-group">
						{{ Form::label('descripcion','Descripción') }}
							<input type="text" name="descripcion" id="descripcion" class="form-control input-lg" value="{{$micro_red->descripcion}}">
						</div>

						
					
						<div class="form-group">
						{{ Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg'])}}

						<a class="btn btn-danger btn-lg" href="{{route('micro_red.index')}}" >Cancelar</a>

						</div>

					{{ Form::close() }}

				</div>

			</div>
		</div>
		</div>
		</div>
	@endsection