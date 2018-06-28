@extends('admin.layout')

@section('titulo')
PERSONAL
@endsection

@section('descripcion')
Crear nuevo Personal
@endsection


@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-xs-6">
        <div style="width: 100%;" class="panel panel-primary">
          <div class="panel-heading">
              Nuevo Personal
          </div>
          <div class="panel-body">
              {{ Form::open(['route'=>'personal.store', 'method'=>'POST']) }} 
                <div class="form-group">
                    {{ Form::label('dni','DNI') }}
                    {{ Form::text('dni',null,['class'=>'form-control input-md','placeholder'=>'Ingrese numero de DNI','required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('nombre','Nombre') }}
                    {{ Form::text('nombre',null,['class'=>'form-control input-md','placeholder'=>'Ingrese nombre','required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('paterno','Apellido Paterno') }}
                    {{ Form::text('paterno',null,['class'=>'form-control input-md','placeholder'=>'Ingrese Apellido Paterno','required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('materno','Apellido Materno') }}
                    {{ Form::text('materno',null,['class'=>'form-control input-md','placeholder'=>'Ingrese Apellido Materno','required']) }}
                </div>

                
                <div class="form-group">
                    {{ Form::label('id_profesion','Profesion') }}
                    {{ Form::select('id_profesion',$profe,null,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'profe']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('colegiatura','Colegiatura') }}
                    {{ Form::text('colegiatura',null,['class'=>'form-control input-md','placeholder'=>'Ingrese Numero de Colegiatura','required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('id_condicion','Tipo de Contrato') }}
                    {{ Form::select('id_condicion',$condicion,null,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'condicion']) }}
                </div>
  
                <div class="form-group">
                    {{ Form::label('id_establecimiento','Establecimiento') }}
                    {{ Form::select('id_establecimiento',$estab,null,['placeholder'=>'Selecciona...', 'class'=>'form-control input-md','id'=>'establecimiento']) }}
                </div>

                

                <div class="form-group">
                  {{ Form::submit('Grabar',['class'=>'btn btn-primary btn-lg'])}}
                <a class="btn btn-danger btn-lg" href="{{url('mantenimiento/personal')}}" >Cancelar
                </a>
                </div>
              {{ Form::close() }}
          </div>
        </div>

      </div>
  </div>

  </div>



@endsection

