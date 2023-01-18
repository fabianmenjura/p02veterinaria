<div class="box box-info padding-1 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="box-body ">

                <div class="form-group">
                    {{ Form::label('Documento') }}
                    {{ Form::text('id_owner', $cita->id_owner, ['class' => 'form-control' . ($errors->has('id_owner') ? ' is-invalid' : ''), 'placeholder' => 'Por favor digite el documento del dueño']) }}
                    {!! $errors->first('id_owner', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Nombres del dueño') }}
                    {{ Form::text('name_owner', $cita->name_owner, ['class' => 'form-control' . ($errors->has('name_owner') ? ' is-invalid' : ''), 'placeholder' => 'Por favor digite el nombre del dueño']) }}
                    {!! $errors->first('name_owner', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Apellidos del dueño') }}
                    {{ Form::text('last_name_owner', $cita->last_name_owner, ['class' => 'form-control' . ($errors->has('last_name_owner') ? ' is-invalid' : ''), 'placeholder' => 'Por favor digite los apellidos del dueño']) }}
                    {!! $errors->first('last_name_owner', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Nombre de la mascota') }}
                    {{ Form::text('name_pet', $cita->name_pet, ['class' => 'form-control' . ($errors->has('name_pet') ? ' is-invalid' : ''), 'placeholder' => 'Por favor digite el nombre de la mascota']) }}
                    {!! $errors->first('name_pet', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">

                    {{ Form::label('Fecha de la cita') }}
                    <input type="datetime-local" id="appointment_date" name="appointment_date" class="form-control"  min='2023-01-14 08:00:00' max='2117-06-14 18:00:00'>

                    @if ($errors->has('appointment_date'))
                    <br>

                    <label style="color:#FF0000" id="minmaxlength-error" class="error" for="minmaxlength">{{ $errors->first('appointment_date') }}</label>
                    @endif
                </div>


                <div class="d-grid gap-8 col-6 mx-auto">
                    <div class="box-footer mt20">
                        <button type="submit" class="btn btn-outline-success btn-lg">Guardar cita</button>
                                             
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>