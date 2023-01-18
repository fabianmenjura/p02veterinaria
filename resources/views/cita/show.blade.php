@extends('layouts.app')

@section('template_title')
{{ $cita->name ?? 'Show Cita' }}
@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-info mb-3 bg-light">

                <div class="card-header">

                    <h2 class="text-center mt-5">Cita # {{ $cita->id}}</h2>
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
                                                      
                                <div class="col-md-11 offset-1 mt-5 mb-5">

                                    <div class="form-group">
                                        <strong>Documento dueño:</strong>
                                        {{ $cita->id_owner }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Nombre del dueño:</strong>
                                        {{ $cita->name_owner }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Apellido del dueño:</strong>
                                        {{ $cita->last_name_owner }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Mascota:</strong>
                                        {{ $cita->name_pet }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Fecha de la cita:</strong>
                                        {{ $cita->appointment_date }}
                                    </div>
                                </div>
                                    <div class="float-right">
                                    <a class="btn btn-light" href="{{ route('citas.index') }}"> Volver</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    Cita creada el {{ $cita->created_at }}
                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection