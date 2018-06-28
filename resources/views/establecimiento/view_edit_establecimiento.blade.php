@extends('admin.layout')

@section('titulo')
EDITAR ESTABLECIMIENTO
@endsection

@section('descripcion')
Edita datos de Establecimiento
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
					<h1 class="panel-title">Modificar Establecimiento</h1>
				</div>
				<div class="panel-body">					
					{{ Form::open(['route'=>['establecimiento.update', $estab->id], 'method'=>'POST']) }} 

						<input name="_method" type="hidden" value="PATCH">

						<div class="form-group">
						{{ Form::label('descripcion','Descripción') }}
						{{ Form::text('descripcion',$estab->descripcion,['class'=>'form-control input-md','placeholder'=>'Ingrese descripción','required']) }}
						</div>

						<div class="form-group">
							{{ Form::label('id_micro_red','Micro Red') }}
                    		{{ Form::select('id_micro_red',$micro,$estab->id_micro_red,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'micro']) }}

                		</div>

                		<div class="form-group">
                    		{{ Form::label('tipo','Tipo') }}
                    		{{ Form::select('tipo',['Puesto de Salud'=>'Puesto de Salud','Centro de Salud'=>'Centro de Salud'],$estab->tipo,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'tipo']) }}
                		</div>

		                <div class="form-group">
		                    {{ Form::label('categoria','Categoria') }}
		                    {{ Form::select('categoria',['I-1 Puesto de Salud'=>'I-1 Puesto de Salud','I-2 Puesto de Salud con Medico'=>'I-2 Puesto de Salud con Medico','I-3 Centro de Salud sin Internamiento'=>'I-3 Centro de Salud sin Internamiento','I-4 Centro de Salud con Internamiento'=>'I-4 Centro de Salud con Internamiento'],$estab->categoria,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'categoria']) }}
		                </div>                


		                <div class="form-group">
		                    {{ Form::label('ugipress','UGIPRESS') }}
		                    {{ Form::text('ugipress',$estab->ugipress,['class'=>'form-control input-md','placeholder'=>'Ingrese codigo UGIPRESS','required']) }}
		                </div>

		                <div class="form-group">
		                    {{ Form::label('ipress','IPRESS') }}
		                    {{ Form::text('ipress',$estab->ipress,['class'=>'form-control input-md','placeholder'=>'Ingrese codigo IPRESS','required']) }}
		                </div>
					
						<div class="form-group">
						{{ Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg'])}}

						<a class="btn btn-danger btn-lg" href="{{route('establecimiento.index')}}" >Cancelar</a>

						</div>

					{{ Form::close() }}

				</div>

			</div>
		</div>
		</div>
		</div>
	@endsection