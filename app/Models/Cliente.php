<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $cedula_c
 * @property $nombre
 * @property $apellido
 * @property $nombreempresa
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'cedula_c' => 'required',
		'nombre' => 'required',
		'apellido' => 'required',
		'nombreempresa' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula_c','nombre','apellido','nombreempresa'];



}
