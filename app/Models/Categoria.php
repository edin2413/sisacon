<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Categoria
 *
 * @property $id
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categoria extends Model
{
    
    static $rules = [
		'descripcion_categoria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion_categoria'];

    public function asiento(): HasMany
    {
      return $this->hasMany(Asiento::class);
    }

}
