<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cita
 *
 * @property $id
 * @property $id_owner
 * @property $name_owner
 * @property $last_name_owner
 * @property $name_pet
 * @property $appointment_date
 * @property $appointment_time
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cita extends Model
{

  static $rules = [
    'id_owner' => 'required',
    'name_owner' => 'required',
    'last_name_owner' => 'required',
    'name_pet' => 'required',
    'appointment_date' => 'required|unique:citas',

  ];
  static $messages = [
    'id_owner.required'  => 'El documento del dueño es requerido',
    'name_owner.required' => 'El nombre del dueño es requerido',
    'last_name_owner.required' => 'El apellido del dueño es requerido',
    'name_pet.required' => 'El nombre de la mascota es requerido',
    'appointment_date.unique' => 'Ya existe una cita para esta fecha y hora, intente cambiar la fecha o la hora',
    'appointment_date.required' => 'La fecha de la cita es requerida',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['id_owner', 'name_owner', 'last_name_owner', 'name_pet', 'appointment_date', 'appointment_time'];
}
