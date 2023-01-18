@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<style>
    .fc-event {
        border: 1px solid #ff6600;
        background-color: #ff6600;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card border-info mb-3">

                <div class="card-header">

                    <h2 class="text-center mt-5">Agenda de citas veterinarias</h2>
                </div>

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container">

                        <div class="row">
                            <div class="col-12">

                                <nav class="nav nav-pills flex-column flex-sm-row">
                                    <a class="flex-sm-fill text-sm-center nav-link active" href="{{ url('/home') }}">Inicio</a>
                                    <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('citas.create') }}">Nueva cita</a>
                                    <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('citas.index') }}">Lista de citas</a>
                                    
                                </nav>
                                <div class="col-md-11 offset-1 mt-5 mb-5">

                                    <div id="calendar">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
    var cita = @json($events);

    $('#calendar').fullCalendar({
        locale: 'es',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
            'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
            'Nov', 'Dic'
        ],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
        header: {
            left: 'prev, next today',
            center: 'title',
           
        },
        events: cita,
        selectable: true,
        selectHelper: true,
        eventClick: function(event) {
            var modal = $("#schedule-edit");
            modal.modal();
        },
        dayClick: function(date, jsEvent, view) {
            $('#schedule-add').modal('show');
        }

    })
</script>

@endsection