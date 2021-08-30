<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 *
 * @property $id
 * @property $codigo
 * @property $nombre
 * @property $descripcion_empresa
 * @property $capital_base
 * @property $capital_actual
 * @property $created_at
 * @property $updated_at
 *
 * @property ControlAsiento[] $controlAsientos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empresa extends Model
{
    
    static $rules = [
		'codigo' => 'required',
		'nombre' => 'required',
		'descripcion_empresa' => 'required',
		'capital_base' => 'required',
		'capital_actual' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','nombre','descripcion_empresa','capital_base','capital_actual'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function controlAsientos()
    {
        return $this->hasMany('App\Models\ControlAsiento', 'empresa_id', 'id');
    }
    

}
