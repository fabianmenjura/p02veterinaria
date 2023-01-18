@extends('layouts.app')

@section('template_title')
Cita
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card border-info mb-3">
                <div class="card-header">

                    <h2 class="text-center mt-5">Agenda de citas veterinarias</h2>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="container">

                        <div class="row">
                            <div class="col-12">

                                <nav class="nav nav-pills flex-column flex-sm-row">
                                    <a class="flex-sm-fill text-sm-center nav-link" href="{{ url('/home') }}">Inicio</a>
                                    <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('citas.create') }}">Nueva cita</a>
                                    <a class="flex-sm-fill text-sm-center nav-link active" href="{{ route('citas.index') }}">Lista de citas</a>

                                </nav>
                                <div class="col-md-11 offset-1 mt-5 mb-5">

                                    <div class="table-responsive">
                                        <table id="mytable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                            <thead class="thead">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Documento dueño</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Nombre mascota</th>
                                                    <th>Fecha de la cita</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($citas as $cita)
                                                <tr>
                                                    <td>{{ ++$i }}</td>

                                                    <td>{{ $cita->id_owner }}</td>
                                                    <td>{{ $cita->name_owner }}</td>
                                                    <td>{{ $cita->last_name_owner }}</td>
                                                    <td>{{ $cita->name_pet }}</td>
                                                    <td>{{ $cita->appointment_date }}</td>

                                                    <!-- algoritmo para cancelar las citas antes de las 2 horas pactadas -->
                                                    @php
                                                    $fecha_actual = strtotime("now");
                                                    $fechacita = strtotime($cita->appointment_date);
                                                    $validacion = $fecha_actual-$fechacita;
                                                    $doshoras = 7200;
                                                    @endphp
                                                    <!-- ***************************************************************** -->
                                                    <td>


                                                    
                                                    <a class="btn btn-sm btn-primary " href="{{ route('citas.show',$cita->id) }}"><i class="fa fa-fw fa-eye"></i> Visualizar</a>
                                                        @if ($validacion<$doshoras) <form action="{{ route('citas.destroy',$cita->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Cancelar cita</button>
                                                            </form>
                                                            <a class="btn btn-sm btn-success" href="{{ route('citas.edit',$cita->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                            @elseif ($validacion>$doshoras) 

                                                                <label style="color:#FF0000" id="minmaxlength-error" class="error" for="minmaxlength">Esta cita ya no se puede cancelar</label>
                                                                @endif
                                                               
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        {!! $citas->links() !!}
    </div>
</div>

</div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>

<script>
    $('#mytable').DataTable({
        "language": {
            "lengthMenu": "Mostrar " +
                '<select class="custom-select custom-select-sm form-control form-control-sm> <option value="5">5</option> <option value="10">10</option> <option value="25">25</option> <option value="50">50</option> <option value="-1">All</option></select>' +
                " registros por página",
            "zeroRecords": "No se encontró registros - lo siento",
            "info": "Mostrando la página _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search': "Buscar",
            'paginate': {
                'next': "Siguiente",
                'previous': "Anterior"
            }
        }
    });
</script>
@endsection