<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asiento
 *
 * @property $id
 * @property $descripcion
 * @property $cantidad
 * @property $precio
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asiento extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'cantidad' => 'required',
		'precio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','cantidad','precio'];



}
