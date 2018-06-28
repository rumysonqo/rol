@extends('admin.layout')

@section('titulo')
EDITAR PERSONAL
@endsection

@section('descripcion')
Edita datos de Personal
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
					<h1 class="panel-title">Modificar Personal</h1>
				</div>
				<div class="panel-body">					
					{{ Form::open(['route'=>['personal.update', $personal->id], 'method'=>'POST']) }} 

						<input name="_method" type="hidden" value="PATCH">

						<div class="form-group">
		                    {{ Form::label('dni','DNI') }}
		                    {{ Form::text('dni',$personal->dni,['class'=>'form-control input-md','placeholder'=>'Ingrese numero de DNI','required']) }}
		                </div>
		                <div class="form-group">
		                    {{ Form::label('nombre','Nombre') }}
		                    {{ Form::text('nombre',$personal->nombre,['class'=>'form-control input-md','placeholder'=>'Ingrese nombre','required']) }}
		                </div>
		                <div class="form-group">
		                    {{ Form::label('paterno','Apellido Paterno') }}
		                    {{ Form::text('paterno',$personal->paterno,['class'=>'form-control input-md','placeholder'=>'Ingrese Apellido Paterno','required']) }}
		                </div>
		                <div class="form-group">
		                    {{ Form::label('materno','Apellido Materno') }}
		                    {{ Form::text('materno',$personal->materno,['class'=>'form-control input-md','placeholder'=>'Ingrese Apellido Materno','required']) }}
		                </div>

		                
		                <div class="form-group">
		                    {{ Form::label('id_profesion','Profesion') }}
		                    {{ Form::select('id_profesion',$profe,$personal->id_profesion,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'profe']) }}
		                </div>

		                <div class="form-group">
		                    {{ Form::label('colegiatura','Colegiatura') }}
		                    {{ Form::text('colegiatura',$personal->colegiatura,['class'=>'form-control input-md','placeholder'=>'Ingrese Numero de Colegiatura','required']) }}
		                </div>

		                <div class="form-group">
		                    {{ Form::label('id_condicion','Tipo de Contrato') }}
		                    {{ Form::select('id_condicion',$condicion,$personal->id_condicion,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'condicion']) }}
		                </div>
		  
		                <div class="form-group">
		                    {{ Form::label('id_establecimiento','Establecimiento') }}
		                    {{ Form::select('id_establecimiento',$estab,$personal->id_establecimiento,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'establecimiento']) }}
		                </div>
					
						<div class="form-group">
						{{ Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg'])}}

						<a class="btn btn-danger btn-lg" href="{{route('personal.index')}}" >Cancelar</a>

						</div>

					{{ Form::close() }}

				</div>

			</div>
		</div>
		</div>
		</div>
	@endsection