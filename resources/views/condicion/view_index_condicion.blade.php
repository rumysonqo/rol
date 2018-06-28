@extends('admin.layout')

@section('titulo')
CONDICION LABORAL
@endsection

@section('descripcion')
Mantenimiento de tipos de condicion laboral
@endsection


@section('content')

@if(Session::has('message'))
  <p class="alert alert-success">{{ Session::get('message') }}
@endif

<div class="row">

  <div class="col-md-12">

  <div class="box">
    <div class="box-header">
      <h1 class="box-title">Lista de Tipos de Condicion Laboral</h1>
      <div class="pull-right">
        <div class="btn-group">
            <a href="{{url('mantenimiento/condicion/create')}}" class="btn btn-primary" >Añadir Condicion</a>
        </div>
      </div>
    </div>

  <div class="box-body">
      <table id="mytable" class="display nowrap">
       <thead>
         <th>Descripcion</th>
         <th>Editar</th>
         <th>Eliminar</th>
       </thead>
       <tbody>
        @if($condicion->count())  
        @foreach($condicion as $cond)  
        <tr>
          <td>{{$cond->descripcion}}</td>
          <td>
            <a class="btn btn-success btn-xs" href="{{action('Ctrl_condicion@edit', $cond->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
          </td>
          <td>
            {{ Form::open(['route'=>['condicion.destroy', $cond->id], 'method'=>'DELETE']) }}
             <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
             {{ Form::close() }}
           </td>
         </tr>
         @endforeach 
         @else
         <tr>
          <td colspan="8">No hay registro !!</td>
        </tr>
        @endif
      </tbody>

    </table>
  </div>      
</div>
</div>
</div>
       
@endsection

@section('script')
<script>
  $(function () {
    $('#mytable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,

      "columns": [
        { "width": "80%" },
            null,
            null
        ],

      "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página.",
        "zeroRecords": "No se encontró registro.",
        "info": "  _START_ de _END_ (_TOTAL_ registros totales).",
        "infoEmpty": "0 de 0 de 0 registros",
        "infoFiltered": "(Encontrado de _MAX_registros)",
        "search": "Buscar: ",
        "processing": "Procesando la información",
        "paginate": {
        "first": " |< ",
        "previous": "Anterior",
        "next": "Siguiente",
        "last": " >| "
        }
        }
    })
  })
</script>
@endsection