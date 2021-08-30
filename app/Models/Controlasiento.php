<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ControlAsiento
 *
 * @property $id
 * @property $empresa_id
 * @property $categoria_id
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Empresa $empresa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ControlAsiento extends Model
{
    
    static $rules = [
		'empresa_id' => 'required',
		'categoria_id' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empresa_id','categoria_id','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
    }

    public function detalleAsiento()
    {
        return $this->hasOne('App\Models\DetalleAsiento', 'id', 'controlasiento_id');
    }
    

}
