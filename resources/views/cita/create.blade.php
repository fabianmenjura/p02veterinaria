@extends('layouts.app')

@section('template_title')
Create Cita
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row justify-content-center">

        <div class="col-md-9">


            @includeif('partials.errors')

            <div class="card border-info mb-3">

                <div class="card-header">
                   
                    <h2 class="text-center mt-5">Agenda de citas veterinarias</h2>
                </div>

                <div class="card-body">
                    <div class="container">

                        <div class="row">
                            <div class="col-12">

                                <nav class="nav nav-pills flex-column flex-sm-row">
                                    <a class="flex-sm-fill text-sm-center nav-link" href="{{ url('/home') }}">Inicio</a>
                                    <a class="flex-sm-fill text-sm-center nav-link active" href="{{ route('citas.create') }}">Nueva cita</a>
                                    <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('citas.index') }}">Lista de citas</a>

                                </nav>

                                <div class="col-md-11 offset-1 mt-5 mb-5">
                                    <p class="card-text">Por favor diligenciar los datos correspondientes</p>
                                    <li>Tener en cuenta que la hora de la cita debe ser exacta (Ej.: 18:00, 08:00)</li>
                                    <div class="card-body ">
                                        <form method="POST" action="{{ route('citas.store') }}" role="form" enctype="multipart/form-data">
                                            @csrf

                                            @include('cita.form')

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection