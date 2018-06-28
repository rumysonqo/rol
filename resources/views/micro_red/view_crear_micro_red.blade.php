@extends('admin.layout')

@section('titulo')
CREAR MICRO RED
@endsection

@section('descripcion')
Crear nueva Micro Red
@endsection


@section('content')
 
<div class="container-fluid">
  <div class="row">
      <div class="col-xs-6">
        <div style="width: 100%;" class="panel panel-primary">
          <div class="panel-heading">
              Nueva Micro Red
          </div>
          <div class="panel-body">
              {{ Form::open(['route'=>'micro_red.store', 'method'=>'POST']) }} 
                <div class="form-group">
                    {{ Form::label('descripcion','Descripción') }}
                    {{ Form::text('descripcion',null,['class'=>'form-control input-lg','placeholder'=>'Ingrese descripción','required']) }}
                </div>

                <div class="form-group">
                  {{ Form::submit('Grabar',['class'=>'btn btn-primary btn-lg'])}}
                <a class="btn btn-danger btn-lg" href="{{url('mantenimiento/micro_red')}}" >Cancelar
                </a>
                </div>
              {{ Form::close() }}
          </div>
        </div>

      </div>
  </div>

  </div>



@endsection

