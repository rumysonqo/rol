@extends('admin.layout')

@section('titulo')
CREAR CONDICION
@endsection

@section('descripcion')
Crear nueva condicion
@endsection


@section('content')
<!--<center><h2>Morbilidad General por Enfermedades CIE-10 Red Cusco Norte 2015</h3></center>
<center><h3>Por Micro Redes y Establecimientos</h4></center>
-->
 
<div class="container-fluid">
  <div class="row">
      <div class="col-xs-6">


        <div style="width: 100%;" class="panel panel-primary">
          <div class="panel-heading">
              Nueva Condición
          </div>
          <div class="panel-body">
              {{ Form::open(['route'=>'condicion.store', 'method'=>'POST']) }} 
                <div class="form-group">
                    {{ Form::label('descripcion','Descripción') }}
                    {{ Form::text('descripcion',null,['class'=>'form-control input-lg','placeholder'=>'Ingrese descripción','required']) }}
                </div>

                <div class="form-group">
                  {{ Form::submit('Grabar',['class'=>'btn btn-primary btn-lg'])}}
                <a class="btn btn-danger btn-lg" href="{{url('mantenimiento/condicion')}}" >Cancelar
                </a>

                  
                </div>



              {{ Form::close() }}


          </div>
        </div>

      </div>
     

  </div>

  </div>


@endsection

