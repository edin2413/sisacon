<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetalleAsiento extends Model
{
    
  
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function controlAsiento(): HasMany
    {
        return $this->hasMany(ControlAsiento::class);
    }


}
