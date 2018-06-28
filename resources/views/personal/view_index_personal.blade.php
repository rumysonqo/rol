@extends('admin.layout')

@section('titulo')
PERSONAL
@endsection

@section('descripcion')
Mantenimiento de Personal
@endsection


@section('content')

@if(Session::has('message'))
  <p class="alert alert-success">{{ Session::get('message') }}
@endif

<div class="row">

  <div class="col-xl-12">

  <div class="box">
    <div class="box-header">
      <h1 class="box-title">Listado de Personal</h1>
      <div class="pull-right">
        <div class="btn-group">
            <a href="{{url('mantenimiento/personal/create')}}" class="btn btn-primary" >Nuevo Personal</a>
        </div>
      </div>
    </div>

  <div class="box-body">
      <table id="mytable" class="display nowrap stripe row-border order-column">
       <thead>
         <th>Nombre</th>
         <th>Ap. Paterno</th>
         <th>Ap. Materno</th>
         <th>DNI</th>
         <th>Profesión</th>
         <th>Colegiatura</th>
         <th>Tipo de Contrato</th>
         <th>Establecimiento</th>
         <th>Editar</th>
         <th>Borrar </th>
       </thead>
       <tbody>
        @if($personal->count())  
        @foreach($personal as $per)  
        <tr>
          <td>{{$per->nombre}}</td>
          <td>{{$per->paterno}}</td>
          <td>{{$per->materno}}</td>
          <td>{{$per->dni}}</td>
          <td>{{$per->profesion}}</td>
          <td>{{$per->colegiatura}}</td>
          <td>{{$per->condicion}}</td>
          <td>{{$per->establecimiento}}</td>
          <td>
            <a class="btn btn-success btn-xs" href="{{action('Ctrl_personal@edit', $per->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
          </td>
          <td>
            {{ Form::open(['route'=>['personal.destroy', $per->id], 'method'=>'DELETE']) }}
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
      'fixedColumns': true,
      'scrollX'     :true,
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      "columns": [
        { "width": "25%" },
        { "width": "25%" },
        { "width": "25%" },
        null,
        null,
        { "width": "20%" },
            null,
            null,
            null,
            null
        ],
        "fixedColumns": {
          "leftColumns": "2"
        },

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