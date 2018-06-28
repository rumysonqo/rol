@extends('admin.layout')

@section('titulo')
ESTABLECIMIENTO
@endsection

@section('descripcion')
Crear nuevo Establecimiento
@endsection


@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-xs-6">
        <div style="width: 100%;" class="panel panel-primary">
          <div class="panel-heading">
              Nuevo Establecimiento
          </div>
          <div class="panel-body">
              {{ Form::open(['route'=>'establecimiento.store', 'method'=>'POST']) }} 
                <div class="form-group">
                    {{ Form::label('descripcion','Descripción') }}
                    {{ Form::text('descripcion',null,['class'=>'form-control input-md','placeholder'=>'Ingrese descripción','required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('id_micro_red','Micro Red') }}
                    {{ Form::select('id_micro_red',$micro,null,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'micro']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('tipo','Tipo') }}
                    {{ Form::select('tipo',['Puesto de Salud'=>'Puesto de Salud','Centro de Salud'=>'Centro de Salud'],null,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'tipo']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('categoria','Categoria') }}
                    {{ Form::select('categoria',['I-1 Puesto de Salud'=>'I-1 Puesto de Salud','I-2 Puesto de Salud con Medico'=>'I-2 Puesto de Salud con Medico','I-3 Centro de Salud sin Internamiento'=>'I-3 Centro de Salud sin Internamiento','I-4 Centro de Salud con Internamiento'=>'I-4 Centro de Salud con Internamiento'],null,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'categoria']) }}
                </div>                


                <div class="form-group">
                    {{ Form::label('ugipress','UGIPRESS') }}
                    {{ Form::text('ugipress',null,['class'=>'form-control input-md','placeholder'=>'Ingrese codigo UGIPRESS','required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('ipress','IPRESS') }}
                    {{ Form::text('ipress',null,['class'=>'form-control input-md','placeholder'=>'Ingrese codigo IPRESS','required']) }}
                </div>


                <div class="form-group">
                  {{ Form::submit('Grabar',['class'=>'btn btn-primary btn-lg'])}}
                <a class="btn btn-danger btn-lg" href="{{url('mantenimiento/establecimiento')}}" >Cancelar
                </a>
                </div>
              {{ Form::close() }}
          </div>
        </div>

      </div>
  </div>

  </div>



@endsection

