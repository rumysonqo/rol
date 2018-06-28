@extends('admin.layout')

@section('titulo')
ESTABLECIMIENTO
@endsection

@section('descripcion')
Mantenimiento de Establecimientos
@endsection


@section('content')

@if(Session::has('message'))
  <p class="alert alert-success">{{ Session::get('message') }}
@endif


      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Leyenda</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-green" style="width: 50">M - Mañana</div>
                <div class="external-event bg-blue" style="width: 50">T - Tarde</div>
                <div class="external-event bg-aqua" style="width: 50">GD - Guardia Diurna</div>
                <div class="external-event bg-yellow" style="width: 50">GN - Guardia Nocturna</div>
                <div class="external-event bg-red" style="width: 50"> L - Libre</div>
                <div class="external-event bg-fuchsia" style="width: 50"> SC - Salida Comunitaria</div>
                <div class="external-event bg-navy" style="width: 50"> N - Noche</div>
              </div>
            </div>

            








            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      
    
       
@endsection

@section('script')



<script>


 $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'grabar',
        center: 'title',
        right : false
      },
      
      /*buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },*/
      //eventClick: function(calEvent, jsEvent, view) {

    /*alert('Event: ' + calEvent.title);
    alert('Event: ' + $(this).css('background-color'));
    alert('Event: ' + $(this).css('border-color'));

    // change the border color just for fun
    //$(this).css('border-color', 'red');

  },*/



eventClick: function(event){ $('#calendar').fullCalendar('removeEvents',event._id); }, 

      height:500,
      overlap:false,
      editable  : true,
      droppable : true,
      selectOverlap:false,
      // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')
        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)
        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        //alert($(this).data('eventObject'));
        //alert(copiedEventObject.backgroundColor);


        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

      }
    })
  })
</script>




<script>
  $(document).ready(function(){
    $("#grabar").click(function(){
      var ev=$('#calendar').fullCalendar('clientEvents');
            //console.log($('#calendar').fullCalendar('clientEvents'));
            /*console.log(moment(ev[0].start).format('YYYY-MM-DD'));
            console.log(moment(ev[0].end).format('YYYY-MM-DD'));
            console.log(ev[0].title);
            console.log(ev[0].backgroundColor);
            console.log(ev[0].borderColor);*/
            var eventos=[];
            $.each(ev, function(index,value)
            {
              var evt=new Object();
              evt.id=value._id;
              evt.title=value.title;
              evt.start=value.start.format('YYYY-MM-DD');
              evt.end=value.start.format('YYYY-MM-DD');
              evt.backgroundColor=value.backgroundColor;
              evt.borderColor=value.borderColor;
              evt.allDay=value.allDay;
              eventos.push(evt);
            });
            var dt=JSON.stringify(eventos);

            $.ajax
            ({
              headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
              method:'post',
              dataType:'json',
              //url: "{{ URL::route('grabar_calendario') }}",
              url: '/',
              data : dt,
              success:function(response){console.log('SUCCES:',response);},
              error:function(response){console.log('ERROR:',response);}
            })
            //.fail(function(jqXHR, textstatus, errorThrown){alert('error')});

    });



  });



</script>  




@endsection