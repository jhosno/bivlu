@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Actividades del Mes</a></li> 
</ul>

<a  id="new-trigger" data-toggle="modal" data-titulo="Inicio de Sesión"  data-target="all-modal" class="btn btn-primary primary-btn"><i class="material-icons ">add</i> Agregar evento</a>
<div class="evento">
    
</div>
<div class="wrapper row" id="calendar">
 
            </div>
@endsection

@section('scripts')
<script type="text/javascript">
 $('#calendar').fullCalendar({
    events: function(start, end, timezone, callback) {
        $.ajax({
            url: 'myxmlfeed.php',
            dataType: 'xml',
            data: {
                // our hypothetical feed requires UNIX timestamps
                start: start.unix(),
                end: end.unix()
            },
            success: function(doc) {
                var events = [];
                $(doc).find('event').each(function() {
                    events.push({
                        title: $(this).attr('title'),
                        start: $(this).attr('start') // will be parsed
                    });
                });
                callback(events);
            }
        });
    }
});
</script>
@endsection