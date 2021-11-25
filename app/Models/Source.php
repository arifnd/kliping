<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    /**
    * Get the type that owns the source.
    */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
