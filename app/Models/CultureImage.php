<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CultureImage extends Model
{
    protected $guarded =[];
    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }

}
